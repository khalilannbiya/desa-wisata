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
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;

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
            $article->get();

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
                                <button data-modal-target="deleteModal" data-modal-toggle="deleteModal" type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                    ',
                        $editUrl,
                        $deleteUrl,
                        method_field('delete'),
                        csrf_field(),
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
        $writers = [];

        if (auth()->user()->role != 'writer') {
            $writers = User::where('role', 'writer')->get();
        }
        return view('components.pages.dashboard.admin.article.create', compact('writers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $photo = $request->file('image');
            $path = $photo->storePublicly("gallery", "public");
            Article::create([
                'author_id' => auth()->user()->role != "writer" ? $request->writer : auth()->user()->id,
                'title' => $request->title,
                'content' => $request->content,
                'image_url' => $path,
                'slug' => Str::slug($request->title . '-' . Str::ulid())
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
    public function show(string $slug)
    {
        $article = Article::with('user')->where('slug', $slug)->firstOrFail();
        // Increment the views count
        $article->increment('views');
        return view('components.pages.frontend.detail-article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);

        $admins = [];

        if (auth()->user()->role != 'writer') {
            $admins = User::where('role', 'writer')->get();
        }

        return view('components.pages.dashboard.admin.article.edit', compact('article', 'admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $article = Article::findOrFail($id);
            $oldTitle = $article->title;

            // Periksa apakah ada gambar baru yang diunggah
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $path = $photo->storePublicly("gallery", "public");
            } else {
                $path = $article->image_url;
            }

            $article->update([
                'author_id' => auth()->user()->role != "writer" ? $request->writer : auth()->user()->id,
                'title' => $request->title,
                'content' => $request->content,
                'image_url' => $path,
                'slug' => $request->title != $oldTitle ? Str::slug($request->title . '-' . Str::ulid()) : $article->slug
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
