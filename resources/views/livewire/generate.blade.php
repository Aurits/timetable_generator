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

    <div class="container-fluid mt-4 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="mb-4 col-lg-8">
                <div class="card" style="height: 500px; width:80vw; border: 1px solid #dee2e6; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Generate Timetable</h5>

                        @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div><br></br>
                        @endif

                        @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form wire:submit.prevent="generateTimetable">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="day" class="form-label">Select Day</label>
                                    <select class="form-select" id="day" wire:model="day">
                                        <option value="">Select Day</option>
                                        <option value="monday">Monday</option>
                                        <option value="tuesday">Tuesday</option>
                                        <option value="wednesday">Wednesday</option>
                                        <option value="thursday">Thursday</option>
                                        <option value="friday">Friday</option>
                                        <option value="saturday">Saturday</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="time_slot" class="form-label">Select Time Slot</label>
                                    <select class="form-select" id="time_slot" multiple size="2" wire:model="timeSlot">
                                        <option value="7:00 AM - 8:00 AM">7:00 AM - 8:00 AM</option>
                                        <option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
                                        <option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                                        <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                        <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                        <option value="12:00 PM - 1:00 PM">12:00 PM - 1:00 PM</option>
                                        <option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
                                        <option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
                                        <option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                                        <option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="classroom" class="form-label">Select Classroom</label>
                                    <select class="form-select" id="classroom" wire:model="selectedClassroom">
                                        <option value="">Select Classroom</option>
                                        @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="height: 20px;"></div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Select Subject</label>
                                    <select class="form-select" id="subject" wire:model="selectedSubject">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="teacher" class="form-label">Select Teacher</label>
                                    <select class="form-select" id="teacher" wire:model="selectedTeacher">
                                        <option value="">Select Teacher</option>
                                        @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

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