<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Questionnaire;
use App\Models\Notification;
use App\Models\Comment;

class HomeController extends Controller
{
    public function landingPage(){
        $articles = Article::orderBy('updated_at', 'desc')->take(3)->get();
            $comments = Comment::orderBy('updated_at', 'desc')->get();
            return view('welcome', compact('articles', 'comments'));
    }
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $questionnaires = Questionnaire::all();
            $notifications = Notification::all();
            $articles = Article::orderBy('updated_at', 'desc')->take(4)->get();
            $comments = Comment::orderBy('updated_at', 'desc')->get();
            return view('admin.home', compact('questionnaires', 'notifications', 'articles', 'comments'));
        } elseif ($user->role == 'user') {
            $notifications = Notification::where('user_id', $user->id)->get();
            $questionnaires = Questionnaire::where('user_id', $user->id)->get();
            $articles = Article::orderBy('updated_at', 'desc')->take(3)->get();
            $comments = Comment::where('updated_at', 'desc')->get();
            return view('user.home', compact('questionnaires','notifications', 'articles', 'comments'));
        }
    }
}
