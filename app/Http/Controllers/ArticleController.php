<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->take(4)->get();
        return view('admin.articles.show', compact('articles'));

        $notifications = Notification::where('user_id', $user->id)->get();
    }

    public function showAll()
    {
        $articles = Article::orderBy('updated_at', 'desc')->get();
        $total_article = Article::count();
        if (Auth::user()->role == 'admin') {
            return view('admin.articles.all_article', compact('articles', 'total_article'));
        } else {
            return view('user.all_article', compact('articles', 'total_article'));
        }
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Simpan gambar ke folder public/images/article
            $request->file('image')->move(public_path('storage/images/article'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $article = new Article;
        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->content = $request->input('content');
        $article->image = $fileNameToStore;
        $article->save();

        return redirect()->route('admin.home')->with('success', 'Article Created');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('admin.articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        $article = Article::find($id);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika bukan default
            if ($article->image != 'noimage.jpg' && file_exists(public_path('storage/images/article/'.$article->image))) {
                unlink(public_path('storage/images/article/'.$article->image));
            }

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $request->file('image')->move(public_path('storage/images/article/'), $fileNameToStore);
            $article->image = $fileNameToStore;
        }

        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->content = $request->input('content');
        $article->save();

        return redirect()->route('admin.home')->with('success', 'Article Updated');
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article->image != 'noimage.jpg' && file_exists(public_path('storage/images/article/'.$article->image))) {
            unlink(public_path('storage/images/article/'.$article->image));
        }

        $article->delete();
        return redirect()->route('admin.home')->with('success', 'Article Deleted');
    }
}
