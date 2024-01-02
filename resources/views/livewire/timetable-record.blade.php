<!-- resources/views/livewire/timetable-record.blade.php -->

<div>
    @if ($isEditing)
    <form wire:submit.prevent="update">
        <!-- Edit form fields go here -->
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
    @else
    <!-- Display record details -->

    <button wire:click="edit" class="btn btn-primary">Edit</button>
    <button wire:click="delete" class="btn btn-danger">Delete</button>
    @endif
</div>