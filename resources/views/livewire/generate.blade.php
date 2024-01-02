<!-- resources/views/livewire/generate-timetable.blade.php -->

<div style="min-height: 100vh; display: flex; flex-direction: column;">
    <!-- Navbar with professional styling -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">TimeTable King</a>

            <div class="d-flex flex-grow-1 justify-content-end">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Generate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Archived</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card" style="height: 500px;">
                    <div class="card-body">
                        <h5 class="card-title">Generate Timetable</h5>

                        <!-- Your timetable generation logic goes here -->
                        <!-- You may use Livewire methods and components to handle the logic -->

                        <!-- Example Form -->
                        <form>
                            <div class="mb-3">
                                <label for="day" class="form-label">Select Day</label>
                                <select class="form-select" id="day">
                                    <!-- Options for days -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="time_slot" class="form-label">Select Time Slot</label>
                                <select class="form-select" id="time_slot">
                                    <!-- Options for time slots -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="classroom" class="form-label">Select Classroom</label>
                                <select class="form-select" id="classroom">
                                    <!-- Options for classrooms -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Select Subject</label>
                                <select class="form-select" id="subject">
                                    <!-- Options for subjects -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="teacher" class="form-label">Select Teacher</label>
                                <select class="form-select" id="teacher">
                                    <!-- Options for teachers -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Generate Timetable</button>
                        </form>
                    </div>
                </div>
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