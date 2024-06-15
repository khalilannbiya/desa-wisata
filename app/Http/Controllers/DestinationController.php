<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DestinationPostRequest;
use App\Models\Destination;
use App\Models\OpeningHour;
use App\Models\ContactDetail;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\Accomodation;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestinationPostRequest $request)
    {
        try {
            DB::beginTransaction();

            // Generate unique code
            $randomNumber = $this->generateUniqueCode();
            // Create destination
            $destination = $this->createDestination($request, $randomNumber);
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

            // Alert::toast('Sukses Menambahkan Destinasi', 'succes');
            return; //name router
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambahkan Destinasi: ' . $e->getMessage()]);
        }
    }

    private function generateUniqueCode()
    {
        do {
            $randomNumber = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Destination::where('unic_code', $randomNumber)->exists());

        return $randomNumber;
    }

    private function createDestination($request, $randomNumber)
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

    private function storeOpeningHours($request, $destination)
    {
        if ($request->has('opening_hours')) {
            foreach ($request->opening_hours as $key => $__) {
                OpeningHour::create([
                    'destination_id' => $destination->id,
                    'day' => $request->input("opening_hours.$key.day"),
                    'open' => $request->input("opening_hours.$key.open"),
                    'close' => $request->input("opening_hours.$key.close"),
                    'is_closed' => $request->is_closed ? $request->is_closed : '0'
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

    private function storeFacilities($request, $destination)
    {
        if ($request->has('facilities')) {
            foreach ($request->facilities as $key => $__) {
                if ($request->has("facilities.$key.name_facilities") && $request->input("fac
                ilities.$key.name_facilities") !== null) {
                    Facility::create([
                        'destination_id' => $destination->id,
                        'name' => $request->input("facilities.$key.name_facilities"),
                    ]);
                }
            }
        }
    }

    private function storeAccomodation($request, $destination)
    {
        if ($request->has('accommodation')) {
            foreach ($request->accommodation as $key => $__) {
                if (
                    $request->has("accommodation.$key.name_accommodation") && $request->input("accommodation.$key.name_accommodation") !== null
                ) {
                    Accomodation::create([
                        'destination_id' => $destination->id,
                        'name' => $request->input("accommodation.$key.name_accommodation"),
                    ]);
                }
            }
        }
    }

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
    public function destroy(string $id)
    {
        //
    }
}
