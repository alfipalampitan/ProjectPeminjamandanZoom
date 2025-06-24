<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')->latest()->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('pegawai.feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi_feedback' => 'required|string',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'isi_feedback' => $request->isi_feedback,
            'rating' => $request->rating
        ]);

        return redirect()->route('feedback.create')->with('success', 'Terima kasih atas feedback Anda!');
    }
}
