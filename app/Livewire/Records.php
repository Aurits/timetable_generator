<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TimetableEntry;
use Livewire\WithPagination;

class Records extends Component
{
    use WithPagination;
    public $entryToDelete;
    public $deleteSuccessMessage;

    public function render()
    {
        // Fetch records from the database with eager loading relationships and paginate
        $entries = TimetableEntry::with('classroom', 'subject', 'teacher')->paginate(10);

        // Pass the paginated entries to the view
        return view('livewire.records', ['entries' => $entries]);
    }

    public function edit($id)
    {
        // Your edit logic here
        // You might want to redirect to an edit page or open a modal for editing
    }

    public function deleteRecord($id)
    {
        $this->entryToDelete = TimetableEntry::find($id);

        // Your delete logic here
        if ($this->entryToDelete) {
            $this->entryToDelete->delete();
            $this->deleteSuccessMessage = 'Record deleted successfully.';
        }
    }

    public function cancelDelete()
    {
        $this->reset(['entryToDelete', 'deleteSuccessMessage']);
    }
}
