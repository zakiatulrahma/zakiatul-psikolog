<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->get();
        $articles = Article::orderBy('updated_at', 'desc')->take(4)->get();
        $comments = Comment::orderBy('updated_at', 'desc')->get();
        $questionnaires = Questionnaire::where('user_id', $user->id)
            ->orderBy('status', 'asc')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('user.home')->with([
            'notifications' => $notifications,
            'questionnaires' => $questionnaires,
            'articles' => $articles,
            'comments' => $comments
        ]);
    }

    public function show(Questionnaire $questionnaire)
    {
        $user = Auth::user();
        if ($questionnaire->user_id != $user->id) {
            return redirect()->route('user.home')->with('error', 'You do not have access to this questionnaire.');
        }
        return view('user.show', compact('questionnaire'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . Auth::id(),
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find(Auth::id());

        // Update user details
        $user->username = $request->input('username');
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');

        // Handle profile picture upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($user->image && file_exists(public_path('storage/images/profile/' . $user->image))) {
                unlink(public_path('storage/images/profile/' . $user->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images/profile'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('user.edit')->with('success', 'Profile updated');
    }
}
