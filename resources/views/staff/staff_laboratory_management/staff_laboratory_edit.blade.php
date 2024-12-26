@extends('staff.staff_dashboard')

@section('staff')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Edit Laboratory</h3>
            </div>
        </div>
    </div>
    <!-- Page Headings End -->

    <div class="row">
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Edit Laboratory Details</h3>
                </div>
                <div class="box-body">
                    <!-- Feedback Messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Edit Form -->
                    <form action="{{ route('staff.laboratory.update', $lab->lab_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="mb-3">
                            <label for="lab_name" class="form-label">Lab Name</label>
                            <input type="text" class="form-control" id="lab_name" name="lab_name" value="{{ $lab->lab_name }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="lab_image" class="form-label">Lab Image</label>
                            @if ($lab->lab_image && file_exists(public_path($lab->lab_image)))
                                <div class="mb-2">
                                    <img src="{{ asset($lab->lab_image) }}" alt="Lab Image" style="width: 100px; height: 100px;">
                                </div>
                            @else
                                <div class="mb-2">
                                    <p>No Image Available</p>
                                </div>
                            @endif

                            <input type="file" class="form-control" id="lab_image" name="lab_image">
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update Laboratory</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
