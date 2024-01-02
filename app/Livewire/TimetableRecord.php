<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use Illuminate\Validation\Rule;

class TimetableRecord extends Component
{
    public $timetableEntry;
    public $isEditing = false;

    protected $rules = [
        'timetableEntry.day' => 'required',
        'timetableEntry.time_slot' => 'required',
        'timetableEntry.classroom_id' => 'required',
        'timetableEntry.subject_id' => 'required',
        'timetableEntry.teacher_id' => 'required',
    ];

    public function mount(TimetableEntry $timetableEntry)
    {
        $this->timetableEntry = $timetableEntry;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $this->timetableEntry->save();

        session()->flash('success', 'Record updated successfully.');

        $this->isEditing = false;
    }

    public function delete()
    {
        $this->timetableEntry->delete();

        session()->flash('success', 'Record deleted successfully.');

        return redirect('/records');
    }

    public function render()
    {
        return view('livewire.timetable-record');
    }
}