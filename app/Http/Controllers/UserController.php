<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::where('role', '!=', 'super_admin')->get();
            return DataTables::of($users)
                ->addColumn('role', function ($item) {
                    if ($item->role == 'owner') {
                        return 'Penanggung Jawab Wisata';
                    } else if ($item->role == 'writer') {
                        return 'Penulis Konten';
                    } else {
                        return 'Admin';
                    }
                })
                ->addColumn('action', function ($item) {
                    $roleName = auth()->user()->role;
                    $editUrl = route("{$roleName}.users.edit", $item->id);
                    $deleteUrl = route("{$roleName}.users.destroy", $item->id);
                    $deleteButton = '
                        <div>
                            <form action="' . $deleteUrl . '" method="POST">
                                ' . method_field('DELETE') . '
                                ' . csrf_field() . '
                                <button data-modal-target="deleteModal" data-modal-toggle="deleteModal" type="submit">Hapus</button>
                            </form>
                        </div>';

                    return sprintf(
                        '
                        <div class="wrapper-action">
                            <a href="%s">Edit</a>
                            %s
                        </div>',
                        $editUrl,
                        $deleteButton
                    );
                })
                ->make(true);
        }


        return view('components.pages.dashboard.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.pages.dashboard.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            User::create([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();

            Alert::toast('Sukses Menambahkan Pengguna', 'success');
            return redirect()->route(auth()->user()->role . '.users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambahkan Pengguna: ' . $e->getMessage()]);
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
    public function edit(User $user)
    {
        return view('components.pages.dashboard.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $user = User::find($id);

            $updateData = [
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->has('password') && !empty($request->password)) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            DB::commit();

            Alert::toast('Sukses Mengubah Pengguna', 'success');
            return redirect()->route(auth()->user()->role . '.users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Mengubah Pengguna: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        Alert::toast('Sukses Menghapus Pengguna', 'success');
        return redirect()->route(auth()->user()->role . '.users.index');
    }
}
