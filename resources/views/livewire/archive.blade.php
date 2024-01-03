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
            <div class="card-header bg-secondary text-white">
                <h2 class="text-center">{{ $class->name }} Timetable</h2>
            </div>
            <div class="card-body">
                @if ($timetableEntries->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th> <!-- Empty corner cell -->
                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                            <th class="text-center">{{ $day }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $timeSlots = [
                        '7:00 AM - 8:00 AM', '8:00 AM - 9:00 AM', '9:00 AM - 10:00 AM',
                        '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 1:00 PM',
                        '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM', '3:00 PM - 4:00 PM', '4:00 PM - 5:00 PM'
                        ];
                        @endphp

                        @foreach($timeSlots as $timeSlot)
                        <tr>
                            <th class="text-center">{{ $timeSlot }}</th>
                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                            <?php
                            $entry = $timetableEntries->first(function ($entry) use ($day, $timeSlot) {
                                return $entry->day == strtolower($day) && $entry->time_slot == $timeSlot;
                            });
                            ?>
                            <td style="padding: 10px; text-align: center; vertical-align: middle;">

                                @if ($entry)
                                <strong>{{ $entry->subject->name }}</strong><br>
                                <span style="font-style: italic;">{{ $entry->teacher->name }}</span>
                                @else
                                <!-- <em>No entry</em> -->
                                @endif

                            </td>

                            @endforeach
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

</div>