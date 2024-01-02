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
        // $this->entries = TimetableEntry::all();
        $this->entries = TimetableEntry::paginate(10); // Change 10 to the number of records per page you desire
    }

    public function render()
    {
        // Pass the paginated entries to the view
        return view('livewire.records', ['entries' => $this->entries]);
    }
}