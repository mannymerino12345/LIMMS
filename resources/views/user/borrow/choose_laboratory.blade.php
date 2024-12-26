@extends('user.user_dashboard')


@section('user_content')
<div class="flat-pages-title-home3">
    <div class="bg-grid-line">
        <div class="bg-line"></div>
    </div>
    <div class="themesflat-container w1346">
        <div class="row">
            <div class="col-12 pages-title">
                <div class="content">
                    <h1 data-wow-delay="0s" class="wow fadeInUp">Choose Laboratories</h1>
                    <p data-wow-delay="0.1s" class="wow fadeInUp">Pick the laboratory that offers the items you’re most interested in.</p>
                    <div data-wow-delay="0.2s" class="wow fadeInUp flat-button flex justify-center">
                        <a href="{{route('user.item.view')}}" class="tf-button style-1 h50 w190 mr-30">View Items <i class="icon-arrow-up-right2"></i></a>
                        <a href="{{route('dashboard')}}" class="tf-button style-1 h50 w190 active">Home <i class="icon-arrow-up-right2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="swiper-container swiper-3d-3cardfull" data-swiper='{
                    "loop": false,
                    "spaceBetween": 0,
                    "slidesPerView": 1,
                    "centeredSlides": false,
                    "freeMode": false,
                    "watchSlidesProgress": true,
                    "effect": "coverflow",
                    "grabCursor": true,
                    "coverflowEffect":{
                        "rotate": 0,
                        "stretch": "-20",
                        "depth": 0,
                        "modifier":1,
                        "scale": "0.9",
                        "slideShadows": false
                    },
                    "navigation": {
                        "prevEl": ".prev-3d",
                        "nextEl": ".next-3d"
                    },
                    "breakpoints": {
                        "500": {
                            "slidesPerView": 2
                        },
                        "991": {
                            "slidesPerView": 3
                        }
                    }
                }'>
                    <div class="swiper-wrapper">
                        @foreach ($laboratory as $lab)
                            <div class="swiper-slide">
                                <div class="tf-card-box style-3">
                                    <div class="card-media">
                                        <a href="{{ route('laboratory.items', $lab->lab_id) }}">
                                            <img src="{{ !empty($lab->lab_image) && file_exists(public_path($lab->lab_image)) ? asset($lab->lab_image) : asset('assets/images/avatar/avatar-07.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="button-place-bid">
                                        <a href="{{ route('laboratory.items', $lab->lab_id) }}" class="tf-button" style="text-transform: uppercase;"><span>{{ $lab->lab_name }}</span></a>
                                    </div>
                                    <div class="card-bottom" style="background-color: #161616; color: white;">
                                        <div class="author flex items-center" style="text-align: center;">
                                            <h1 style="text-transform: uppercase;">{{ $lab->lab_name }}</h1>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next next-3d over"></div>
                <div class="swiper-button-prev prev-3d over"></div>
            </div>
        </div>
    </div>
</div>
@endsection