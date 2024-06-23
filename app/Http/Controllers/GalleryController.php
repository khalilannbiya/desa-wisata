<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\GalleryCreateRequest;
use App\Models\Gallery;

class GalleryController extends Controller
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
    public function store(GalleryCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $photos = $request->file('galleries');
            foreach ($photos as $photo) {
                $path = $photo->storePublicly("gallery", "public");
                Gallery::create([
                    'destination_id' => $request->destination_id,
                    'image_url' => $path,
                ]);
            }

            DB::commit();

            Alert::toast('Sukses Menambah Galeri', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambah Galeri: ' . $e->getMessage()]);
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
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        Alert::toast('Berhasil menghapus data Galeri', 'success');
        return redirect()->back();
    }
}
