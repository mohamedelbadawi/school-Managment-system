<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeQuizRequest;
use App\Models\Grad;
use App\Models\Grade;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Redirect;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::with(['questions', 'grade', 'subject', 'level', 'classroom'])->get();
        return view('quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('quiz.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeQuizRequest $request)
    {
        // dd($request);
        try {
            $quiz = Quiz::create([
                'title' => $request->title,
                'grade_id' => $request->grade_id,
                'level_id' => $request->level_id,
                'subject_id' => $request->subject_id,
                'class_room_id' => $request->classroom_id,
                'teacher_id' => auth()->guard('teacher')->id()
            ]);
            foreach ($request->questions as $question) {
                Question::create([
                    'title' => $question['title'],
                    'answer_1' => $question['answer_1'],
                    'answer_2' => $question['answer_2'],
                    'answer_3' => $question['answer_3'],
                    'answer_4' => $question['answer_4'],
                    'right_answer' => $question['right_answer'],
                    'point' => $question['point'],
                    'quiz_id' => $quiz->id
                ]);
            }

            return redirect()->back()->with(['success' => 'Quiz created successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function delete(Quiz $quiz)
    {
        try {
            $quiz->delete();
            toastr()->success('quiz deleted successfully');
        } catch (\Throwable $th) {
            toastr()->error('something error!');
        }
        return redirect()->route('quiz.index');
    }
}
