<?php

namespace App\Http\Controllers;

use App\Models\Quiz;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function show($quizId)
    {
        $quiz = Quiz::with(['questions.answers'])->findOrFail($quizId);
        return view('quizzes.show', compact('quiz'));
    }
}
