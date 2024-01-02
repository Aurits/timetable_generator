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
}