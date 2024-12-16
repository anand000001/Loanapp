
<body>

    <div class="container mt-5">
        <h2>Create a New Group</h2>
    
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <!-- Button to Open Modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#groupModal">Add Group</button>
    
        <!-- Bootstrap Modal -->
        <div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="groupModalLabel">Add Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('groups.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="group_name" class="form-label">Group Name</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="group_leadername" class="form-label">Leader Name</label>
                                <input type="text" class="form-control" id="group_leadername" name="group_leadername" required>
                            </div>
                            <div class="mb-3">
                                <label for="group_leadernumber" class="form-label">Leader Number</label>
                                <input type="text" class="form-control" id="group_leadernumber" name="group_leadernumber" required>
                            </div>
                            <button type="submit" class="btn btn-success">Save Group</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    </body>
    
    