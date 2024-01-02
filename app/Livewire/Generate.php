<?php

namespace App\Livewire;

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

    public function render()
    {
        return view('livewire.generate');
    }
}