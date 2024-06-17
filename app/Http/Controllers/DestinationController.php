<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Facility;
use App\Models\Destination;
use App\Models\OpeningHour;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\ContactDetail;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\DestinationCreateRequest;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $destination = Destination::latest();
            return DataTables::of($destination)
                ->addColumn('action', function ($item) {
                    $roleName = auth()->user()->role;
                    $editUrl = route("{$roleName}.destinations.edit", $item->id);
                    $deleteUrl = route("{$roleName}.destinations.destroy", $item->id);

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

        return view('components.pages.dashboard.admin.destination.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.pages.dashboard.admin.destination.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestinationCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            // Create destination
            $destination = $this->createDestination($request);

            // Store opening hours
            $this->storeOpeningHours($request, $destination);

            // Store contact details
            $this->storeContactDetails($request, $destination);

            // Store galleries
            $this->storeGalleries($request, $destination);

            // Store facilities
            $this->storeFacilities($request, $destination);

            // Store accommodation
            $this->storeAccomodation($request, $destination);

            DB::commit();

            Alert::toast('Sukses Menambahkan Destinasi', 'success');
            return redirect()->route(auth()->user()->role . '.destinations.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambahkan Destinasi: ' . $e->getMessage()]);
        }
    }

    private function createDestination($request)
    {
        return Destination::create([
            'owner_id' => auth()->user()->id,
            'name' => $request->name_destination,
            'description' => $request->description,
            'location' => $request->location,
            'price_range' => $request->price_range,
            'status' => $request->status,
            'slug' => Str::slug($request->name_destination . '-' . Str::ulid())
        ]);
    }

    private function storeGalleries($request, $destination)
    {
        $photos = $request->file('galleries');
        foreach ($photos as $photo) {
            $path = $photo->storePublicly("gallery", "public");
            Gallery::create([
                'destination_id' => $destination->id,
                'image_url' => $path,
            ]);
        }
    }

    private function storeOpeningHours($request, $destination)
    {
        if ($request->has('opening_hours')) {
            foreach ($request->opening_hours as $key => $__) {
                OpeningHour::create([
                    'destination_id' => $destination->id,
                    'day' => $request->input("opening_hours.$key.day"),
                    'open' => $request->has("opening_hours.$key.is_closed") ? null : $request->input("opening_hours.$key.open"),
                    'close' => $request->has("opening_hours.$key.is_closed") ? null : $request->input("opening_hours.$key.close"),
                    'is_closed' => $request->has("opening_hours.$key.is_closed") ? $request->input("opening_hours.$key.is_closed") : '0'
                ]);
            }
        }
    }

    private function storeContactDetails($request, $destination)
    {
        if ($request->has('contact_details')) {
            foreach ($request->contact_details as $key => $__) {
                ContactDetail::create([
                    'destination_id' => $destination->id,
                    'type' => $request->input("contact_details.$key.type"),
                    'value' => $request->input("contact_details.$key.value"),
                ]);
            }
        }
    }

    private function storeFacilities($request, $destination)
    {
        if ($request->has('facilities.*')) {
            foreach ($request->facilities as $facility) {
                Facility::create([
                    'destination_id' => $destination->id,
                    'name' => $facility,
                ]);
            }
        }
    }

    private function storeAccomodation($request, $destination)
    {
        if ($request->has('accommodations.*')) {
            foreach ($request->accommodations as $accommodation) {
                Accommodation::create([
                    'destination_id' => $destination->id,
                    'name' => $accommodation
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        Alert::toast('Berhasil menghapus data destinasi', 'success');
        return redirect()->route(auth()->user()->role . '.destinations.index');
    }
}
