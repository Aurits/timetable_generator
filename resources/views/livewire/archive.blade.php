<div style="min-height: 100vh; display: flex; flex-direction: column; background-color: #f8f9fa;">

    <!-- Navbar with professional styling -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">TimeTable King</a>

            <div class="d-flex flex-grow-1 justify-content-end">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="/generate">Generate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/records">Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/archived">Archived</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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


    <!-- Footer with a professional look -->
    <footer class="footer mt-auto py-3 bg-dark text-light">
        <div class="container">
            <span class="text-muted">TimeTable Generator © 2024. All rights reserved.</span>


        </div>
    </footer>