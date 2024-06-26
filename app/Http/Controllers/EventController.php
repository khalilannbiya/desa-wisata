<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventUpdateRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $events = Event::query();
            if (auth()->user()->role === 'admin') {
                $events->where('admin_id', auth()->user()->id);
            }
            $events->get();
            return DataTables::of($events)
                ->addColumn('action', function ($item) {
                    $roleName = auth()->user()->role;
                    $editUrl = route("{$roleName}.events.edit", $item->id);
                    $deleteUrl = route("{$roleName}.events.destroy", $item->id);

                    return sprintf(
                        '
                        <div class="wrapper-action">
                            <a href="%s">Edit</a>
                            <div>
                                <form action="%s" method="post">
                                    %s %s
                                    <button type="submit">Hapus</button>
                                </form>
                            </div>
                        </div>',
                        $editUrl,
                        $deleteUrl,
                        method_field('delete'),
                        csrf_field()
                    );
                })
                ->make();
        }

        return view('components.pages.dashboard.admin.event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = [];

        if (auth()->user()->role == 'super_admin') {
            $admins = User::where('role', 'admin')->get();
        }
        return view('components.pages.dashboard.admin.event.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $photo = $request->file('image');
            $path = $photo->storePublicly("gallery", "public");

            Event::create([
                'admin_id' => auth()->user()->role == "super_admin" ? $request->admin : auth()->user()->id,
                'image_url' => $path,
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'gmaps_url' => $request->gmaps_url,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'slug' => Str::slug($request->name . '-' . Str::ulid())
            ]);

            DB::commit();

            Alert::toast('Sukses Menambahkan Acara', 'success');
            return redirect()->route(auth()->user()->role . '.events.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambahkan Acara: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        return view('components.pages.frontend.detail-event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $admins = [];

        if (auth()->user()->role == 'super_admin') {
            $admins = User::where('role', 'admin')->get();
        }
        return view('components.pages.dashboard.admin.event.edit', compact('event', 'admins'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(EventUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $event = Event::findOrFail($id);

            // Periksa apakah ada gambar baru yang diunggah
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $path = $photo->storePublicly("gallery", "public");
            } else {
                $path = $event->image_url;
            }

            $event->update([
                'admin_id' => auth()->user()->role == "super_admin" ? $request->admin : auth()->user()->id,
                'image_url' => $path,
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'gmaps_url' => $request->gmaps_url,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'slug' => Str::slug($request->name . '-' . Str::ulid())
            ]);

            DB::commit();

            Alert::toast('Sukses Mengupdate Acara', 'success');
            return redirect()->route(auth()->user()->role . '.events.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Mengupdate Acara: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        Alert::toast('Sukses Menghapus Acara', 'success');
        return redirect()->route(auth()->user()->role . '.events.index');
    }
}
