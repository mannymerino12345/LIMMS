@extends('admin.admin_dashboard')

@section('admin')
<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Change Password <span>/ Setting</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-30">



        <div class="d-flex justify-content-center align-items-center vh-50">
            <div class="col-lg-6 col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h4 class="title">Change Password</h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{ route('admin.password.update') }}">
                            @csrf
                            <div class="row mbn-20">
                        
                                <!-- Old Password -->
                                <div class="col-12 mb-20">
                                    <div class="row">
                                        <div class="col-sm-3 col-12 mb-10">
                                            <label for="old_password" class="form-label">Old Password</label>
                                        </div>
                                        <div class="col-sm-9 col-12 mb-10">
                                            <input type="password" id="old_password" name="old_password" 
                                                   class="form-control @error('old_password') is-invalid @enderror">
                                            @error('old_password')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- New Password -->
                                <div class="col-12 mb-20">
                                    <div class="row">
                                        <div class="col-sm-3 col-12 mb-10">
                                            <label for="new_password" class="form-label">New Password</label>
                                        </div>
                                        <div class="col-sm-9 col-12 mb-10">
                                            <input type="password" id="new_password" name="new_password" 
                                                   class="form-control @error('new_password') is-invalid @enderror">
                                            @error('new_password')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Confirm Password -->
                                <div class="col-12 mb-20">
                                    <div class="row">
                                        <div class="col-sm-3 col-12 mb-10">
                                            <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                                        </div>
                                        <div class="col-sm-9 col-12 mb-10">
                                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                                                   class="form-control @error('new_password_confirmation') is-invalid @enderror">
                                            @error('new_password_confirmation')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Submit and Cancel Buttons -->
                                <div class="col-12 mb-20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                                </div>
                        
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        

    </div>

</div><!-- Content Body End -->

@endsection