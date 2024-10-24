<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'usia' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'domisili' => 'required|string|max:255',
            'layanan' => 'required|string|max:255',
            'keluhan' => 'required|string|max:255',
            'tanggal_konseling' => 'required|date',
            'waktu_konseling' => 'required|string|max:255',
            'psikolog' => 'required|string|max:255',
        ]);
        
    
        // Logic to check for duplicate bookings
        $existingBooking = Questionnaire::where('tanggal_konseling', $request->tanggal_konseling)
                                  ->where('waktu_konseling', $request->waktu_konseling)
                                  ->first();
    
        if ($existingBooking) {
            return redirect()->back()->withErrors(['duplicate' => 'Tanggal dan jam yang dipilih sudah ada yang mengajukan, coba pilih waktu lainnya.'])->withInput();
        }
    
        // Store the booking in the database
        
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';
        Questionnaire::create($data);
    
        return redirect()->route('user.questionnaires.showAll')->with('success', 'Questionnaire submitted successfully.');
    }

    public function showAll()
    {   
        $user = Auth::user();
        $total_questioner = Questionnaire::count();
        if (Auth::user()->role == 'admin') {
            $questionnaires = Questionnaire::orderBy('status', 'asc')->orderBy('updated_at', 'desc')->get();
            return view('admin.questionnaires.all_questioner', compact('questionnaires', 'total_questioner'));
        } else {
            $questionnaires = Questionnaire::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();
            return view('user.all_questioner', compact('questionnaires', 'total_questioner'));
        }
        
    }

    public function sendFeedback(Request $request, $id)
    {
        $data = $request->validate([
            'feedback' => 'required|string|max:255',
        ]);

        $questionnaire = Questionnaire::findOrFail($id);

        if ($questionnaire->status === 'approved') {
            $questionnaire->update([
                'feedback' => $data['feedback']
            ]);

            return redirect()->back()->with('success', 'Feedback sent successfully.');
        }

        return redirect()->back()->with('error', 'Feedback can only be sent for approved questionnaires.');
    }

    public function submitRating(Request $request, $id)
    {
        $data = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'ulasan' => 'required|string|max:255',
        ]);

        $questionnaire = Questionnaire::findOrFail($id);

        if ($questionnaire->feedback) {
            $questionnaire->update([
                'rating' => $data['rating'],
                'ulasan' => $data['ulasan']
            ]);

            return redirect()->back()->with('success', 'Rating and review submitted successfully.');
        }

        return redirect()->back()->with('error', 'You can only submit a review after receiving feedback.');
    }


}

