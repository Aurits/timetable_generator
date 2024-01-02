<div style="min-height: 100vh; display: flex; flex-direction: column;">
    <!-- Navbar with professional styling -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Your School Name</a>

            <div class="d-flex flex-grow-1 justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card" style="height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">Add Classroom</h5>
                        @if ($successMessage && $successMessage === 'Classroom added successfully!')
                        <div class="alert alert-success" role="alert">
                            {{ $successMessage }}
                            <button wire:click="dismissMessage" type="button" class="btn-close"
                                aria-label="Close"></button>
                        </div>
                        @endif
                        <form wire:submit.prevent="addClassroom">
                            <div class="mb-3">
                                <label for="classroom" class="form-label">Classroom Name</label>
                                <input type="text" class="form-control" id="classroom" wire:model="classroom">
                            </div>
                            @error('classroom')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="" style="height: 10px;"></div>
                            <button type="submit" class="btn btn-success">Add Classroom</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card" style="height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">Add Subject</h5>
                        @if ($successMessage && $successMessage === 'Subject added successfully!')
                        <div class="alert alert-success" role="alert">
                            {{ $successMessage }}
                            <button wire:click="dismissMessage" type="button" class="btn-close"
                                aria-label="Close"></button>
                        </div>
                        @endif
                        <form wire:submit.prevent="addSubject">
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject Name</label>
                                <input type="text" class="form-control" id="subject" wire:model="subject">
                            </div>
                            @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="" style="height: 10px;"></div>
                            <button type="submit" class="btn btn-warning">Add Subject</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card" style="height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">Add Teacher</h5>
                        @if ($successMessage && $successMessage === 'Teacher added successfully!')
                        <div class="alert alert-success" role="alert">
                            {{ $successMessage }}
                            <button wire:click="dismissMessage" type="button" class="btn-close"
                                aria-label="Close"></button>
                        </div>
                        @endif
                        <form wire:submit.prevent="addTeacher">
                            <div class="mb-3">
                                <label for="teacher" class="form-label">Teacher Name</label>
                                <input type="text" class="form-control" id="teacher" wire:model="teacher">
                            </div>
                            @error('teacher')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="" style="height: 10px;"></div>
                            <button type="submit" class="btn btn-info">Add Teacher</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer with a professional look -->
    <footer class="footer mt-auto py-3 bg-dark text-light">
        <div class="container">
            <span class="text-muted">Your School © 2024. All rights reserved.</span>
        </div>
    </footer>
</div>