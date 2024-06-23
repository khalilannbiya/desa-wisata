<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AccommodationCreateRequest;
use App\Models\Accommodation;

class AccommodationController extends Controller
{
    public function store(AccommodationCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            Accommodation::create([
                'destination_id' => $request->destination_id,
                'name' => $request->name_accommodation
            ]);

            DB::commit();

            Alert::toast('Sukses Menambah Akomodasi', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambah Akomodasi: ' . $e->getMessage()]);
        }
    }

    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();

        Alert::toast('Berhasil menghapus data Akomodasi', 'success');
        return redirect()->back();
    }
}
