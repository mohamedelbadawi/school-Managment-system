<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Atempt;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::where('class_room_id', auth()->user()->class_room_id)->with(['questions'])->get();
        return view('quiz.student.index', compact('quizzes'));
    }
    public function show(Quiz $quiz)
    {
        $questions = $quiz->questions;
        Atempt::create([
            'student_id' => auth('student')->id(),
            'quiz_id' => $quiz->id
        ]);
        return view('quiz.student.show', compact('questions', 'quiz'));
    }
}
