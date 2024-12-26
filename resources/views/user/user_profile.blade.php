
@extends('user.user_dashboard')

@section('user_content')
<div class="flat-pages-title-home7 relative">
    <div class="themesflat-container">
        <div id="settings" class="tabcontent">
            <div class="wrapper-content">
                <div class="inner-content">
                    <div class="action__body w-full mb-40">
                        <div class="tf-tsparticles">
                            <div id="tsparticles8" data-color="#161616" data-line="#000"></div>
                        </div>
                        <h2>USER PROFILE</h2>
                        <div class="flat-button flex">
                            <a href="#" class="tf-button style-2 h50 w190 mr-10">
                                Back<i class="icon-arrow-up-right2"></i>
                            </a>
                            <a href="#" class="tf-button style-2 h50 w230">
                                Settings<i class="icon-arrow-up-right2"></i>
                            </a>
                        </div>
                        <div class="bg-home7">
                            <div class="swiper-container autoslider3reverse" data-swiper='{
                                "loop": true,
                                "slidesPerView": "auto",
                                "spaceBetween": 14,
                                "direction": "vertical",
                                "speed": 10000,
                                "observer": true,
                                "observeParents": true,
                                "autoplay": {
                                    "delay": "0",
                                    "disableOnInteraction": false
                                }
                            }'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="assets/images/item-background/enhance.png" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/images/item-background/enhance.png" alt="">
                                    </div>
                                </div>
                            </div>
        
                            <div class="swiper-container autoslider4reverse" data-swiper='{
                                "loop": true,
                                "slidesPerView": "auto",
                                "spaceBetween": 14,
                                "direction": "vertical",
                                "speed": 10000,
                                "observer": true,
                                "observeParents": true,
                                "autoplay": {
                                    "delay": "0",
                                    "disableOnInteraction": false,
                                    "reverseDirection": true
                                }
                            }'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="assets/images/item-background/enhance.png" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/images/item-background/enhance.png" alt="">
                                    </div>
                                </div>
                            </div>
        
                            <div class="swiper-container autoslider3reverse" data-swiper='{
                                "loop": true,
                                "slidesPerView": "auto",
                                "spaceBetween": 14,
                                "direction": "vertical",
                                "speed": 10000,
                                "observer": true,
                                "observeParents": true,
                                "autoplay": {
                                    "delay": "0",
                                    "disableOnInteraction": false
                                }
                            }'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="assets/images/item-background/enhance.png" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/images/item-background/enhance.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="heading-section">
                        <h2 class="tf-title pb-30">Setting</h2>
                    </div>
        
                    <!-- Profile Edit Section -->
                    <div class="widget-edit mb-30 profile">
                        <div class="title">
                            <h4>Edit your profile</h4>
                            <i class="icon-keyboard_arrow_up"></i>
                        </div>
                        <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data" id="commentform" class="comment-form" novalidate="novalidate">
                            @csrf
                            <div class="flex gap30">
                                <fieldset class="name">
                                    <label>Your name*</label>
                                    <input type="text" id="name" name="name" placeholder="Enter your name" value="{{$profileData->name}}">
                                </fieldset>
                                
                                <fieldset class="name">
                                    <label>Your ID Number*</label>
                                    <input type="text" id="id_number" name="id_number" placeholder="Enter your ID number" value="{{$profileData->id_number}}">
                                </fieldset>
                                <fieldset class="tel">
                                    <label>Phone number</label>
                                    <input type="tel" id="tel" name="tel" placeholder="Your phone" value="{{$profileData->phone}}">
                                </fieldset>
                            </div>
        
                            <div class="flex gap30">
                                <fieldset class="name">
                                    <label>Address</label>
                                    <input type="text" id="address" name="address" placeholder="Enter your address" value="{{$profileData->address}}">
                                </fieldset>
                                <fieldset class="email">
                                    <label>Email address*</label>
                                    <input type="email" id="email" name="email" placeholder="Your email" value="{{$profileData->email}}" >
                                </fieldset>
                            </div>
                            <div class="widget-edit mb-30 avatar">
                                <div class="uploadfile flex">
                                    <img src="{{ !empty($profileData->photo) && file_exists(public_path('upload/user_images/'.$profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('assets/images/avatar/avatar-07.png') }}" alt="" style="width: 100px; height: 100px; object-fit: cover;">
        
                                    <div>
                                        <h6>Upload a new Image</h6>
                                        <label>
                                            <input type="file" name="photo" class="multifile-upload-input with preview" multiple>
                                            <span class="text filename">No files selected</span>
                                        </label>
                                        <p class="text">JPEG 100x100</p>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-submit">
                                <button class="w242" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
