<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use App\Models\Classroom;

class Archived extends Component
{
    // Public properties for data binding
    public $class;
    public $timetableEntries;

    // Mount method to initialize the component
    public function mount()
    {
        // Default values or initialization logic can be added here
    }

    // Method to fetch and show timetable entries by class
    public function showByClass($classId)
    {
        // Find the class by ID
        $this->class = Classroom::findOrFail($classId);

        // Fetch timetable entries for the class
        $this->timetableEntries = TimetableEntry::where('classroom_id', $this->class->id)
            ->orderBy('day')
            ->orderBy('time_slot')
            ->get();

        // Render the Livewire component with updated data
        return $this->render();
    }

    // Render method to update the Livewire component's view
    public function render()
    {
        // Pass the class and timetableEntries data to the Livewire view
        return view('livewire.archived', [
            'class' => $this->class,
            'timetableEntries' => $this->timetableEntries,
        ]);
    }
}
