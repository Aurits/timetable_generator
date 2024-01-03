<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use App\Models\Classroom;

class Archived extends Component
{
    public $class;
    public $timetableEntries;

    public function showByClass($classId)
    {
        $this->class = Classroom::findOrFail($classId);
        $this->timetableEntries = TimetableEntry::where('classroom_id', $this->class->id)
            ->orderBy('day')
            ->orderBy('time_slot')
            ->get();

        return view('livewire.archived', [
            'class' => $this->class,
            'timetableEntries' => $this->timetableEntries,
        ]);
    }

    public function render()
    {
        return view('livewire.archived');
    }
}
