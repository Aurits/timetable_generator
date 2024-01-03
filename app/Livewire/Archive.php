<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use App\Models\Classroom;

class Archive extends Component
{
    public $class;
    public $timetableEntries;

    public function render()
    {
        return view('livewire.archive');
    }

    public function mount($classId)
    {
        $this->class = Classroom::findOrFail($classId);
        $this->timetableEntries = TimetableEntry::where('classroom_id', $this->class->id)
            ->orderBy('day')
            ->orderBy('time_slot')
            ->get();

        //dd($this->class, $this->timetableEntries);
    }
}
