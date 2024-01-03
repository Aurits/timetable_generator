<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use App\Models\Classroom;

class Archived extends Component
{
    public $class;
    public $timetableEntries;
    public $classes; // Add this property for the list of classes

    public function mount()
    {
        // Fetch and set the list of classes
        $this->classes = Classroom::all();
    }

    public function showByClass($classId)
    {
        $this->class = Classroom::findOrFail($classId);
        $this->timetableEntries = TimetableEntry::where('classroom_id', $this->class->id)
            ->orderBy('day')
            ->orderBy('time_slot')
            ->get();

        return $this->render();
    }

    public function render()
    {
        return view('livewire.archived', [
            'class' => $this->class,
            'timetableEntries' => $this->timetableEntries,
            'classes' => $this->classes, // Pass the list of classes to the view
        ]);
    }
}
