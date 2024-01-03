<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="text-center">{{ $class->name }} Timetable</h2>
        </div>
        <div class="card-body">
            @if ($timetableEntries->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time Slot</th>
                        <th>Subject</th>
                        <th>Teacher</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timetableEntries as $entry)
                    <tr>
                        <td>{{ ucfirst($entry->day) }}</td>
                        <td>{{ $entry->time_slot }}</td>
                        <td>{{ $entry->subject->name }}</td>
                        <td>{{ $entry->teacher->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-center">No timetable entries available for {{ $class->name }}.</p>
            @endif
        </div>
    </div>
</div>