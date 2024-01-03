<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use App\Models\Classroom;

class Archived extends Component
{
    public function showByClass($classId)
    {
        $class = Classroom::findOrFail($classId);
        $timetableEntries = TimetableEntry::where('classroom_id', $class->id)
            ->orderBy('day')
            ->orderBy('time_slot')
            ->get();

        return view('livewire.archived', compact('class', 'timetableEntries'));
    }
}
