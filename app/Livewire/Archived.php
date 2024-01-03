<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use App\Models\Classroom;

class Archived extends Component
{

    public $classes; // Add this property for the list of classes

    public function mount()
    {
        // Fetch and set the list of classes
        $this->classes = Classroom::all();
    }


    public function render()
    {
        return view('livewire.archived', [
            'classes' => $this->classes,
        ]);
    }
}
