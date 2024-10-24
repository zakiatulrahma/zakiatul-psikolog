<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Notification;

class AdminController extends Controller
{
    public function index()
    {
        $total_notif = Notification::count();
        $total_questioner = Questionnaire::count();
        $total_article = Article::count();
        $total_comment = Comment::count();

        $questionnaires = Questionnaire::orderBy('status', 'asc')->orderBy('updated_at', 'desc')->take(5)->get();
        $notifications = Notification::orderBy('updated_at', 'desc')->take(7)->get();
        $articles = Article::orderBy('updated_at', 'desc')->take(3)->get();
        $comments = Comment::orderBy('updated_at', 'desc')->take(7)->get();
        return view('admin.home', compact('questionnaires', 'notifications', 'articles', 'comments', 'total_notif', 'total_questioner', 'total_article', 'total_comment'));
    }

    public function show(Questionnaire $questionnaire)
    {
        return view('admin.show', compact('questionnaire'));
    }

    public function update(Request $request, Questionnaire $questionnaire)
    {
        if ($questionnaire->status !== 'pending') {
            return redirect()->route('admin.home')->with('error', 'Cannot update a non-pending questionnaire.');
        }

        $data = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $action = $request->input('action');
        $questionnaire->status = $action == 'approve' ? 'approved' : 'rejected';
        $questionnaire->admin_message = $data['message'];
        $questionnaire->save();

        Notification::create([
            'user_id' => $questionnaire->user_id,
            'message' => 'Your questionnaire (' . $questionnaire->name . ') has been ' . $questionnaire->status . '. Message: ' . $data['message'] . ' (Updated on: ' . now() . ')'
        ]);

        return redirect()->route('admin.home')->with('success', 'Questionnaire updated successfully.');
    }
}
