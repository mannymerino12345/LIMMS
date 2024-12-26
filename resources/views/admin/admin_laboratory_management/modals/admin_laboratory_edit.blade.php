
<!-- Add Laboratory Modal -->
<div class="modal fade" id="addLabModal" tabindex="-1" aria-labelledby="addLabModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 150px;"> <!-- Adjust the top margin here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabModalLabel">Add New Laboratory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.laboratory.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="lab_name" class="form-label">Laboratory Name</label>
                        <input type="text" class="form-control" id="lab_name" name="lab_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="lab_image" class="form-label">Laboratory Image</label>
                        <input type="file" class="form-control" id="lab_image" name="lab_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Laboratory</button>
                </div>
            </form>            
        </div>
    </div>
</div>


