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
        return view('livewire.records');
    }
}