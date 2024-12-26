@extends('staff.staff_dashboard')

@section('staff')
<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Staff Profile</h3>
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
                            <img src="{{(!empty($profileData->photo)) ? url('upload/staff_images/'.$profileData->photo) : url('upload/profile.jpg')}}" alt="Profile Image" style="width: 150px; height: 150px; border-radius: 50%;">
                            
                        </div>
                        <div class="info" style="text-align: center;">
                            <h5>{{$profileData->name}}</h5>
                            <p></p>
                            <a href="#" class="edit"><i class="zmdi zmdi-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        <!--Author Top End-->

        <!--Timeline / Activities Start-->
        <div class="col-xlg-8 col-12 mb-50">
            <div class="box">

                <div class="box-head">
                    <h3 class="title">Edit / Information</h3>
                </div>

                <div class="box-body">

                    <div class="col-lg-12 col-12 mb-30">
                        <div class="box">
                            
                            <div class="box-body">
                                <form method="POST" action="{{ route('staff.profile.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mbn-20">
                                        <!-- Full Name -->
                                        <div class="col-12 mb-20">
                                            <div class="row mbn-10">
                                                <div class="col-sm-3 col-12 mb-10"><label for="name">Full Name</label></div>
                                                <div class="col-sm-9 col-12 mb-10"><input type="text" id="name" name="name" class="form-control" value="{{ $profileData->name }}"></div>
                                            </div>
                                        </div>
                                
                                        <!-- ID Number -->
                                        <div class="col-12 mb-20">
                                            <div class="row mbn-10">
                                                <div class="col-sm-3 col-12 mb-10"><label for="id_number">ID Number</label></div>
                                                <div class="col-sm-9 col-12 mb-10"><input type="text" id="id_number" name="id_number" class="form-control" value="{{ $profileData->id_number }}"></div>
                                            </div>
                                        </div>
                                
                                        <!-- Email -->
                                        <div class="col-12 mb-20">
                                            <div class="row mbn-10">
                                                <div class="col-sm-3 col-12 mb-10"><label for="email">Email</label></div>
                                                <div class="col-sm-9 col-12 mb-10"><input type="email" id="email" name="email" class="form-control" value="{{ $profileData->email }}"></div>
                                            </div>
                                        </div>
                                
                                        <!-- Phone Number -->
                                        <div class="col-12 mb-20">
                                            <div class="row mbn-10">
                                                <div class="col-sm-3 col-12 mb-10"><label for="phone">Phone Number</label></div>
                                                <div class="col-sm-9 col-12 mb-10"><input type="text" id="phone" name="phone" class="form-control" value="{{ $profileData->phone }}"></div>
                                            </div>
                                        </div>
                                
                                        <!-- Address -->
                                        <div class="col-12 mb-20">
                                            <div class="row mbn-10">
                                                <div class="col-sm-3 col-12 mb-10"><label for="address">Address</label></div>
                                                <div class="col-sm-9 col-12 mb-10"><input type="text" id="address" name="address" class="form-control" value="{{ $profileData->address }}"></div>
                                            </div>
                                        </div>
                                
                                        <!-- Profile Image -->
                                        <div class="col-12 mb-20">
                                            <div class="row mbn-10">
                                                <div class="col-sm-3 col-12 mb-10">
                                                    <label for="photo">Profile Image</label>
                                                </div>
                                                <div class="col-sm-9 col-12 mb-10">
                                                    <input type="file" id="photo" name="photo" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Display Profile Image -->
                                        <div class="col-12 mb-20">
                                            <div class="col-sm-9 text-secondary">
                                                <img id="showImage"
                                                    src="{{ $profileData->photo ? url('upload/staff_images/'.$profileData->photo) : url('upload/profile.jpg') }}"
                                                    alt="Profile Image"
                                                    class="rounded-circle p-1 bg-primary"
                                                    width="100">
                                            </div>
                                        </div>
                                
                                        <!-- Remember Me Checkbox -->
                                        <div class="col-12 mb-20">
                                            <label class="adomx-checkbox">
                                                <input type="checkbox" name="remember"><i class="icon"></i>Remember me
                                            </label>
                                        </div>
                                
                                        <!-- Submit Button -->
                                        <div class="col-12 mb-20">
                                            <input type="submit" value="Submit" class="button button-primary">
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--Timeline / Activities End-->

        <!--Right Sidebar Start-->
        <div class="col-xlg-4 col-12 mb-50">
            <div class="row mbn-30">

                <!--Author Information Start-->
                <div class="col-xlg-12 col-lg-6 col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h3 class="title">Staff Information</h3>
                        </div>
                        <div class="box-body">
                            <div class="form">
                                <form action="#">
                                    <div class="row row-10 mbn-20">
                                        <div class="col-sm-6 col-12 mb-20">
                                            <label for="name" class="d-block mb-2">Full Name</label>
                                            <input type="text" id="name" class="form-control" value="{{$profileData->name}}">
                                        </div>
                                        <div class="col-sm-6 col-12 mb-20">
                                            <label for="lastName" class="d-block mb-2">ID Number</label>
                                            <input type="text" id="lastName" class="form-control" value="{{$profileData->id_number}}">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="phoneNumber" class="d-block mb-2">Phone Number</label>
                                            <input type="text" id="phoneNumber" class="form-control" value="{{$profileData->phone}}" data-mask="(999) 999-9999">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="email" class="d-block mb-2">Email Address</label>
                                            <input type="email" id="email" class="form-control" value="{{$profileData->email}}">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="address" class="d-block mb-2">Address</label>
                                            <input type="text" id="address" class="form-control" value="{{$profileData->address}}">
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>

                    </div>
                </div>
                <!--Author Information End-->

                

                

            </div>
        </div>
        <!--Right Sidebar End-->

    </div>

</div><!-- Content Body End -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#photo').change(function (e) { // Corrected ID to 'photo' to match input
            var reader = new FileReader();
            reader.onload = function (event) {
                $('#showImage').attr('src', event.target.result); // Properly fetches image data
            };
            if (e.target.files && e.target.files[0]) { // Ensures file is selected
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    });
</script>

@endsection