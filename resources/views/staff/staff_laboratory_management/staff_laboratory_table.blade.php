@extends('staff.staff_dashboard')

@section('staff')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Laboratory Management</span></h3>
            </div>
        </div>
        <!-- Page Heading End -->
    </div>
    <!-- Page Headings End -->
    
    <div class="row">
        <!-- Basic Table Start -->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Laboratory Table</h3>
                </div>
                <div class="box-body">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add Laboratory Button -->
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addLabModal">Add Laboratory</button>
                    
                    <table class="table footable"
                           data-paging="true"
                           data-filtering="true"
                           data-sorting="true"
                           data-breakpoints='{ "xs": 480, "sm": 768, "md": 992, "lg": 1200, "xl": 1400 }'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Laboratory Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($laboratories as $lab)
                            <tr>
                                <td>{{ $lab->lab_id }}</td>
                                <td>{{ $lab->lab_name }}</td>
                                <td>
                                    @if ($lab->lab_image)
                                    <img src="{{ file_exists(public_path($lab->lab_image)) ? url($lab->lab_image) : url('upload/profile.jpg') }}" alt="Lab Image" style="width: 100px; height: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('staff.laboratory.edit', $lab->lab_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('staff.laboratory.destroy', $lab->lab_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this laboratory?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No laboratories found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Basic Table End -->
    </div>
</div>


<!-- Add Laboratory Modal -->
<div class="modal fade" id="addLabModal" tabindex="-1" aria-labelledby="addLabModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 150px;"> <!-- Adjust the top margin here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabModalLabel">Add New Laboratory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('staff.laboratory.create') }}" method="POST" enctype="multipart/form-data">
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




@endsection
