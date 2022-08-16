<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Atempt;
use App\Models\Question;
use App\Models\QuestionResult;
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

    public function submitQuiz(Request $request, Quiz $quiz)
    {

        try {
            foreach ($request->except('_token') as $k => $v) {
                $question = Question::findOrFail($k);
                if ($question->right_answer == $v) {
                    QuestionResult::updateorCreate([
                        'student_id' => auth('student')->id(),
                        'quiz_id' => $quiz->id,
                        'question_id' => $question->id, 'points' => $question->point
                    ]);
                }
            }
            toastr()->success('quiz submited successfully');
            return redirect()->route('student.quiz.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
