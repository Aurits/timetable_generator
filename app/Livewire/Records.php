<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;

class Records extends Component
{
    public $entries;

    public function mount()
    {
        // Fetch records from the database
        $this->entries = TimetableEntry::all();
    }

    public function render()
    {
        $entries = TimetableEntry::paginate(10); // Change 10 to the number of records per page you desire
        return view('livewire.records', ['entries' => $entries]);
    }
}