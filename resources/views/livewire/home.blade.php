<div>
    <!-- Navbar with professional styling -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Your School Name</a>
            <!-- Add any additional navigation items as needed -->
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Classroom</h5>
                        <form wire:submit.prevent="addClassroom">
                            <div class="mb-3">
                                <label for="classroom" class="form-label">Classroom Name</label>
                                <input type="text" class="form-control" id="classroom" wire:model="classroom">
                            </div>
                            <button type="submit" class="btn btn-success">Add Classroom</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Subject</h5>
                        <form wire:submit.prevent="addSubject">
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject Name</label>
                                <input type="text" class="form-control" id="subject" wire:model="subject">
                            </div>
                            <button type="submit" class="btn btn-warning">Add Subject</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Teacher</h5>
                        <form wire:submit.prevent="addTeacher">
                            <div class="mb-3">
                                <label for="teacher" class="form-label">Teacher Name</label>
                                <input type="text" class="form-control" id="teacher" wire:model="teacher">
                            </div>
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