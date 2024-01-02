<?php

namespace App\Livewire;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;

class Generate extends Component
{
    public $classrooms;
    public $subjects;
    public $teachers;
    public $selectedClassroom;
    public $selectedSubject;
    public $selectedTeacher;

    public function mount()
    {
        // Fetch records from the database
        $this->classrooms = Classroom::all();
        $this->subjects = Subject::all();
        $this->teachers = Teacher::all();
    }



    public function store(Request $request)
    {
        // Validate the request data as needed

        $timetableEntry = new TimetableEntry([
            'day' => $request->day,
            'time_slot' => $request->time_slot,
            'classroom_id' => $request->classroom_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
        ]);

        // Check for collision before saving
        if (!$timetableEntry->isColliding()) {
            $timetableEntry->save();
            // Handle success or redirect as needed
        } else {
            // Handle collision, e.g., return an error response
            return response()->json(['message' => 'Timetable collision detected.'], 422);
        }
    }


    public function render()
    {
        return view('livewire.generate');
    }
}