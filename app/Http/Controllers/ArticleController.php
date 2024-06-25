<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Mengecek apakah permintaan yang diterima adalah permintaan AJAX
        if (request()->ajax()) {
            // Membuat query untuk model article
            $article = Article::with('user');

            // Jika pengguna memiliki peran 'writer', filter data berdasarkan author_id pengguna saat ini
            if (auth()->user()->role === 'writer') {
                $article->where('author_id', auth()->user()->id);
            }

            // Mengurutkan data berdasarkan yang terbaru
            $article->latest();

            // Mengembalikan data dalam format DataTables
            return DataTables::of($article)
                ->addColumn('writer', function ($item) {
                    return $item->user ? $item->user->name : 'Tidak ada penulis'; // Ganti 'name' dengan atribut penulis yang sesuai
                })
                // Menambahkan kolom aksi untuk setiap item
                ->addColumn('action', function ($item) {
                    $roleName = auth()->user()->role;
                    $editUrl = route("{$roleName}.articles.edit", $item->id);
                    $deleteUrl = route("{$roleName}.articles.destroy", $item->id);

                    // Membuat tombol edit dan hapus untuk setiap item
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

        // Jika bukan permintaan AJAX, mengembalikan view untuk halaman dashboard
        return view('components.pages.dashboard.admin.article.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.pages.dashboard.admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image_url' => 'required|image|mimes:jpg,jpeg,png|max:1048'
            ]);

            Article::create([
                'author_id' => auth()->user()->id,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'image_url' => $request->file('image_url')->store('public/articles'),
                'slug' => Str::slug($request->input('title') . '-' . Str::ulid())
            ]);

            DB::commit();

            Alert::toast('Sukses Menambahkan Artikel', 'success');
            return redirect()->route(auth()->user()->role . '.articles.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambahkan Artikel: ' . $e->getMessage()]);
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
        $article = Article::findOrFail($id);

        $author = [];

        if (auth()->user()->role !== 'writer') {
            $author = User::where('role', 'writer')->get();
        }

        return view('components.pages.dashboard.admin.article.edit', compact('article', 'author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image_url' => 'required|image|mimes:jpg,jpeg,png|'
            ]);

            $article = Article::findOrFail($id);
            if ($article->image_url) {
                Storage::delete($article->image_url);
            }

            $article->update([
                'author_id' =>  auth()->user()->role != "writer" ? $request->input('author_id') : auth()->user()->id,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'image_url' => $request->file('image_url')->store('public/articles'),
                'slug' => Str::slug($request->input('title') . '-' . Str::ulid())
            ]);

            DB::commit();

            Alert::toast('Sukses Mengubah Artikel', 'success');
            return redirect()->route(auth()->user()->role . '.articles.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Mengubah Artikel: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        Alert::toast('Sukses Menghapus Artikel', 'success');
        return redirect()->route(auth()->user()->role . '.articles.index');
    }
}
