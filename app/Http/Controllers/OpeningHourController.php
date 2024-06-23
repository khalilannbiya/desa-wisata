<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\OpeningHourUpdateRequest;
use App\Models\OpeningHour;

class OpeningHourController extends Controller
{

    public function update(OpeningHourUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $days = [$request->input("opening_hours.first_day"), $request->input("opening_hours.last_day")];

            $openingHours = OpeningHour::where('destination_id', $id)->get();

            foreach ($openingHours as $key => $openingHour) {

                $openingHour->update([
                    'day' => $days[$key],
                    'open' => $request->input("opening_hours.open"),
                    'close' => $request->input("opening_hours.close")
                ]);
            }

            DB::commit();

            Alert::toast('Sukses Ubah Jadwal operasional', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Ubah Jadwal operasional: ' . $e->getMessage()]);
        }
    }
}
