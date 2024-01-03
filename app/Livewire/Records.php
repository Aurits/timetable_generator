<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use Livewire\WithPagination;

class Records extends Component
{
    use WithPagination;

    public function render()
    {
        // Fetch records from the database with eager loading relationships and paginate
        $entries = TimetableEntry::with('classroom', 'subject', 'teacher')->paginate(10);

        // Pass the paginated entries to the view
        return view('livewire.records', ['entries' => $entries]);
    }
}
