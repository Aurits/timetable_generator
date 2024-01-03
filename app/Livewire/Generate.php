<?php

namespace App\Livewire;

use App\Models\TimetableEntry;
use Illuminate\Validation\Rule;
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
    public $day;
    public $timeSlot;

    public function mount()
    {
        // Fetch records from the database
        $this->classrooms = Classroom::all();
        $this->subjects = Subject::all();
        $this->teachers = Teacher::all();
    }

    public function generateTimetable()
    {
        $successMessages = [];

        $this->validate([
            'day' => 'required',
            'timeSlot' => 'required|array|min:1',
            'timeSlot.*' => Rule::in([
                '7:00 AM - 8:00 AM', '8:00 AM - 9:00 AM', '9:00 AM - 10:00 AM',
                '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 1:00 PM',
                '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM', '3:00 PM - 4:00 PM', '4:00 PM - 5:00 PM',
            ]),
            'selectedClassroom' => 'required',
            'selectedSubject' => 'required',
            'selectedTeacher' => 'required',
        ]);

        foreach ($this->timeSlot as $selectedTimeSlot) {
            $timetableEntry = new TimetableEntry([
                'day' => $this->day,
                'time_slot' => $selectedTimeSlot,
                'classroom_id' => $this->selectedClassroom,
                'subject_id' => $this->selectedSubject,
                'teacher_id' => $this->selectedTeacher,
            ]);

            if ($timetableEntry->isColliding()) {
                session()->flash('error', 'Timetable collision detected for time slot: ' . $selectedTimeSlot . '. Please choose a different time slot, classroom, teacher, or subject.');
            } elseif (!$timetableEntry->isTeacherAvailable()) {
                session()->flash('error', 'Teacher is not available during the selected time for time slot: ' . $selectedTimeSlot . '. Please choose a different time slot or teacher.');
            } elseif (!$timetableEntry->isClassroomAvailable()) {
                session()->flash('error', 'Classroom is not available during the selected time for time slot: ' . $selectedTimeSlot . '. Please choose a different time slot or classroom.');
            } elseif (!$timetableEntry->isSubjectAvailable()) {
                session()->flash('error', 'Subject is not available during the selected time for time slot: ' . $selectedTimeSlot . '. Please choose a different time slot or subject.');
            } else {
                $timetableEntry->save();
                $successMessages[] = 'Timetable entry for time slot: ' . $selectedTimeSlot . ' stored successfully.';
                $this->clearForm();
            }
        }

        if (!empty($successMessages)) {
            session()->flash('success', implode(' ', $successMessages));
        }
    }




    private function clearForm()
    {
        $this->day = null;
        $this->timeSlot = [];
        $this->selectedClassroom = null;
        $this->selectedSubject = null;
        $this->selectedTeacher = null;
    }

    public function render()
    {
        return view('livewire.generate');
    }
}
