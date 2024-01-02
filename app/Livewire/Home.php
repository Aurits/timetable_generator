<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;

class Home extends Component
{
    public $classroom;
    public $subject;
    public $teacher;
    public $successMessage;

    public function render()
    {
        return view('livewire.home');
    }

    public function addClassroom()
    {
        $this->validate([
            'classroom' => 'required|unique:classrooms,name',
        ]);

        try {
            Classroom::create(['name' => $this->classroom]);
            $this->resetFields();
            $this->successMessage = 'Classroom added successfully!';
        } catch (\Exception $e) {
            $this->successMessage = 'Error adding classroom. Please try again.';
        }
    }

    public function addSubject()
    {
        $this->validate([
            'subject' => 'required|unique:subjects,name',
        ]);

        try {
            Subject::create(['name' => $this->subject]);
            $this->resetFields();
            $this->successMessage = 'Subject added successfully!';
        } catch (\Exception $e) {
            $this->successMessage = 'Error adding subject. Please try again.';
        }
    }

    public function addTeacher()
    {
        $this->validate([
            'teacher' => 'required|unique:teachers,name',
        ]);

        try {
            Teacher::create(['name' => $this->teacher]);
            $this->resetFields();
            $this->successMessage = 'Teacher added successfully!';
        } catch (\Exception $e) {
            $this->successMessage = 'Error adding teacher. Please try again.';
        }
    }

    private function resetFields()
    {
        $this->classroom = '';
        $this->subject = '';
        $this->teacher = '';
    }

    public function dismissMessage()
    {
        $this->successMessage = '';
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'classroom' => 'unique:classrooms,name',
            'subject' => 'unique:subjects,name',
            'teacher' => 'unique:teachers,name',
        ]);
    }
}