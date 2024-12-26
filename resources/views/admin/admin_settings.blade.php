@extends('admin.admin_dashboard')

@section('admin')
<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Settings <span>/</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row">

        <!--Button Outline Start-->
        <div class="col-lg-6 col-12 mb-30">
            <div class="box">
                <div class="box-head d-flex align-items-center">
                    <h4 class="title">Change Password</h4>
                    <a href="{{url('admin/change/password')}}" class="btn btn-outline-info ms-auto"><span>View</span></a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-12 mb-30">
            <div class="box">
                <div class="box-head d-flex align-items-center">
                    <h4 class="title">Staff Settings</h4>
                    <a href="{{url('admin/staff/settings')}}" class="btn btn-outline-info ms-auto"><span>View</span></a>
                </div>
            </div>
        </div>
        
        
        <!--Button Outline End-->

    </div>

</div><!-- Content Body End -->

@endsection