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


    <div class="container-fluid mt-4 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="mb-4">
                <div class="card" style="height: 500px;">
                    <div class="card-body">
                        <h5 class="card-title">Generate Timetable</h5>

                        <form>
                            <div class="row mb-3">
                                <!-- Column 1: Select Day -->
                                <div class="col-md-4">
                                    <label for="day" class="form-label">Select Day</label>
                                    <select class="form-select" id="day">
                                        <!-- Options for days -->
                                    </select>
                                </div>

                                <!-- Column 2: Select Time Slot -->
                                <div class="col-md-4">
                                    <label for="time_slot" class="form-label">Select Time Slot</label>
                                    <select class="form-select" id="time_slot">
                                        <!-- Options for time slots -->
                                    </select>
                                </div>

                                <!-- Column 3: Select Classroom -->
                                <div class="col-md-4">
                                    <label for="classroom" class="form-label">Select Classroom</label>
                                    <select class="form-select" id="classroom">
                                        <!-- Options for classrooms -->
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- Column 4: Select Subject -->
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Select Subject</label>
                                    <select class="form-select" id="subject">
                                        <!-- Options for subjects -->
                                    </select>
                                </div>

                                <!-- Column 5: Select Teacher -->
                                <div class="col-md-6">
                                    <label for="teacher" class="form-label">Select Teacher</label>
                                    <select class="form-select" id="teacher">
                                        <!-- Options for teachers -->
                                    </select>
                                </div>
                            </div>

                            <!-- Row 6: Submit Button -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Generate Timetable</button>
                                </div>
                            </div>
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