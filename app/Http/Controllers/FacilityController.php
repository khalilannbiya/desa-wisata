<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\FacilityCreateRequest;
use App\Models\Facility;

class FacilityController extends Controller
{

    public function store(FacilityCreateRequest $request)
    {

        try {
            DB::beginTransaction();

            facility::create([
                'destination_id' => $request->destination_id,
                'name' => $request->name_facility
            ]);

            DB::commit();

            Alert::toast('Sukses Menambah Fasilitas', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambah Fasilitas: ' . $e->getMessage()]);
        }
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        Alert::toast('Berhasil menghapus data Fasilitas', 'success');
        return redirect()->back();
    }
}
