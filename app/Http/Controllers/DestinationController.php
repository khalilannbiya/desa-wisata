<?php

namespace App\Http\Controllers;

use App\Models\User;
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
use App\Http\Requests\DestinationUpdateRequest;
use App\Http\Requests\OpeningHourUpdateRequest;
use App\Http\Requests\ContactDetailUpdateRequest;
use App\Http\Requests\FacilityUpdateRequest;
use App\Http\Requests\AccommodationUpdateRequest;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $destination = Destination::query();
            if (auth()->user()->role === 'owner') {
                $destination->where('owner_id', auth()->user()->id);
            }
            $destination->latest();
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
        $owners = [];

        if (auth()->user()->role !== 'owner') {
            $owners = User::where('role', 'owner')->get();
        }
        return view('components.pages.dashboard.admin.destination.create', compact('owners'));
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
            'owner_id' => auth()->user()->role != "owner" ? $request->owner : auth()->user()->id,
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
        $days = [$request->input("opening_hours.first_day"), $request->input("opening_hours.last_day")];
        foreach ($days as $day) {
            OpeningHour::create([
                'destination_id' => $destination->id,
                'day' => $day,
                'open' => $request->input("opening_hours.open"),
                'close' => $request->input("opening_hours.close"),
            ]);
        }
    }

    private function storeContactDetails($request, $destination)
    {
        if ($request->has('contact_details')) {
            ContactDetail::create([
                'destination_id' => $destination->id,
                'phone' => $request->input('contact_details.phone'),
                'email' => $request->input('contact_details.email'),
                'social_media' => $request->input('contact_details.social_media')
            ]);
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
        $destination = Destination::with(['galleries', 'openingHours', 'facilities', 'accommodations', 'contactDetails'])->where('id', $id)->firstOrFail();

        $title = 'Hapus Foto Destinasi!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('components.pages.dashboard.admin.destination.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(DestinationUpdateRequest $request, string $id)
    {
        try {

            DB::beginTransaction();

            // Find the existing destination
            $destination = Destination::findOrFail($id);

            $destination->update([
                'name' => $request->name_destination,
                'description' => $request->description,
                'location' => $request->location,
                'price_range' => $request->price_range,
                'status' => $request->status,
                'slug' => Str::slug($request->name_destination . '-' . Str::ulid())
            ]);

            DB::commit();

            Alert::toast('Sukses Memperbarui Destinasi', 'success');
            return redirect()->route(auth()->user()->role . '.destinations.index');
        } catch (\Exception $e) {

            return back()->withErrors(['error' => 'Gagal Memperbarui Destinasi: ' . $e->getMessage()]);
        }
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
