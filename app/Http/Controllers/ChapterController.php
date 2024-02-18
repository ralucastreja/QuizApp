<?php

namespace App\Http\Controllers;

use App\Models\Chapter;

use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::with('quizzes')->get();
        return view('chapters.index', compact('chapters'));
    }

}
