<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;

class Records extends Component
{
    public $entries;

    public function mount()
    {
        // Fetch records from the database and store them in $this->entries
        $this->entries = TimetableEntry::paginate(10); // Change 10 to the number of records per page you desire
    }

    public function render()
    {
        return view('livewire.records');
    }
}