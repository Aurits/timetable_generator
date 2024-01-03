<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use App\Models\Classroom;


class Archive extends Component
{
    public $class;
    public $timetableEntries;
    public function render($classId)
    {
        $this->class = Classroom::findOrFail($classId);
        $this->timetableEntries = TimetableEntry::where('classroom_id', $this->class->id)
            ->orderBy('day')
            ->orderBy('time_slot')
            ->get();

        return view('livewire.archive', [
            'class' => $this->class,
            'timetableEntries' => $this->timetableEntries,
            'classes' => $this->classes,
        ]);
    }
}
