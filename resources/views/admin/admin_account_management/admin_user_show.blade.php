@extends('admin.admin_dashboard')

@section('admin')
<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Admin Profile</h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-50">

        <!--Author Top Start-->
        <div class="col-12 mb-70">
            <div class="author-top">
                <div class="inner" style="background-image: url('assets/images/avatar/slsu_logo1.jpg'); background-size: cover; background-position: center; padding: 20px; border-radius: 10px; height: 350px; position: relative;">
                    <div class="author-profile" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);">
                        <div class="image " style="width: 150px; height: 150px;">
                            <!-- Display the profile image -->
                            <img src="{{ $user->photo ? url('upload/admin_images/'.$user->photo) : url('upload/profile.jpg') }}" 
                            alt="" 
                            style="width: 150px; height: 150px; border-radius: 50%;">
                     
                        </div>
                        <div class="info" style="text-align: center;">
                            <h5>{{ $user->name }}</h5>
                            <p></p>
                            <a href="#" class="edit"><i class="zmdi zmdi-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        <!--Author Top End-->

        <!--Timeline / Activities Start-->
        <div class="col-12 mb-50"> <!-- Adjusted class for full width -->
            <div class="box">
        
                <div class="box-head">
                    <h3 class="title">Edit / Information</h3>
                </div>
        
                <div class="box-body">
                    <div class="row mbn-20">
                        <!-- Full Name -->
                        <div class="col-12 mb-20">
                            <div class="row">
                                <div class="col-md-2 col-12 mb-10"><label for="name">Full Name</label></div>
                                <div class="col-md-10 col-12 mb-10"><input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}"></div>
                            </div>
                        </div>
        
                        <!-- ID Number -->
                        <div class="col-12 mb-20">
                            <div class="row">
                                <div class="col-md-2 col-12 mb-10"><label for="id_number">ID Number</label></div>
                                <div class="col-md-10 col-12 mb-10"><input type="text" id="id_number" name="id_number" class="form-control" value="{{ $user->id_number }}"></div>
                            </div>
                        </div>
        
                        <!-- Email -->
                        <div class="col-12 mb-20">
                            <div class="row">
                                <div class="col-md-2 col-12 mb-10"><label for="email">Email</label></div>
                                <div class="col-md-10 col-12 mb-10"><input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}"></div>
                            </div>
                        </div>
        
                        <!-- Phone Number -->
                        <div class="col-12 mb-20">
                            <div class="row">
                                <div class="col-md-2 col-12 mb-10"><label for="phone">Phone Number</label></div>
                                <div class="col-md-10 col-12 mb-10"><input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}"></div>
                            </div>
                        </div>
        
                        <!-- Address -->
                        <div class="col-12 mb-20">
                            <div class="row">
                                <div class="col-md-2 col-12 mb-10"><label for="address">Address</label></div>
                                <div class="col-md-10 col-12 mb-10"><input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}"></div>
                            </div>
                        </div>  
                        <!-- Submit Button -->
                        <div class="col-12 mb-20 text-right"> <!-- Aligned button to the right -->
                            <a href="{{ route('admin.user.table') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Timeline / Activities End-->

    </div>

</div><!-- Content Body End -->

@endsection