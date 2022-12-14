<?php

namespace App\Http\Controllers;

use App\Events\meetingCreated;
use App\Http\Requests\storeMeetingRequest;
use App\Http\traits\ZoomMeetingTrait;
use App\Models\Grade;
use App\Models\Meeting;
use App\Models\Student;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    use ZoomMeetingTrait;
    public function index()
    {
        if (auth()->guard('teacher')->check()) {
            $meetings = Meeting::with(['grade', 'level', 'classroom', 'subject'])->where('teacher_id', auth()->guard('teacher')->id())->get();
            $grades = Grade::all();
        } else if (auth()->guard('student')->check()) {
            $meetings = Meeting::with(['grade', 'level', 'classroom', 'subject'])->where('class_room_id', auth()->guard('student')->user()->class_room_id)->get();
            $grades = Grade::all();
        }
        return view('meeting.index', compact('meetings', 'grades'));
    }
    public function store(storeMeetingRequest $request)
    {
        $meeting = $this->createMeeting($request);
        $zoom = Meeting::create([
            'grade_id' => $request->grade_id,
            'level_id' => $request->level_id,
            'subject_id' => $request->subject_id,
            'class_room_id' => $request->classroom_id,
            'title' => $request->title,
            'meeting_id' => $meeting->id,
            'start_url' => $meeting->start_url,
            'join_url' => $meeting->join_url,
            'password' => $meeting->password,
            'start_at' => $request->start_at,
            'teacher_id' => auth()->guard('teacher')->id(),

        ]);

        event(new meetingCreated($zoom, $request->classroom_id));
        return redirect()->route('meeting.index');
    }

    public function notifyStudents($classroom_id)
    {
    }
}
