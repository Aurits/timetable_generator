<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use Livewire\WithPagination;

class Records extends Component
{
    public $entries;
    use WithPagination;

    public function mount()
    {


        // Fetch records from the database
        $this->entries = TimetableEntry::with('classroom', 'subject', 'teacher')->paginate();
    }

    public function render()
    {
        // Pass the paginated entries to the view
        return view('livewire.records', ['entries' => $this->entries]);
    }
}