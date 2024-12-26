@extends('user.user_dashboard')

@section('user_content')
<div class="flat-pages-title-home7 relative">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-6 pages-title">
                <div class="content">
                    <h1>WELCOME <br> TO <br> LIMMS</h1>
                    <p>Enhance Lab Efficiency with Secure and Easy-to-Use Item Tracking.</p>
                    <div class="flat-button flex">
                        <a href="{{route('user.choose.laboratory')}}" class="tf-button style-1 h50 w230 mr-10">Borrow Item <i class="icon-arrow-up-right2"></i></a>
                    </div>
                </div>
                <div class="icon-background">
                    <img class="absolute item1" src="assets/images/item-background/item8.png" alt="">
                    <img class="absolute item2" src="assets/images/item-background/item1.png" alt="">
                    <img class="absolute item3" src="assets/images/item-background/item1.png" alt="">
                    <img class="absolute item4" src="assets/images/item-background/item7.png" alt="">
                    <img class="absolute item6" src="assets/images/item-background/item1.png" alt="">
                    <img class="absolute item7" src="assets/images/item-background/item9.png" alt="">
                    <img class="absolute item8" src="assets/images/item-background/item1.png" alt="">
                    <img class="absolute item9" src="assets/images/item-background/item1.png" alt="">
                    <img class="absolute item10" src="assets/images/item-background/item2.png" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="image-right">
                    <img class="item1" src="assets/images/item-background/weslsulogi.png" alt="">
                    <img class="item2" src="assets/images/item-background/item5.png" alt="">
                    <img class="item3" src="assets/images/item-background/item15.png" alt="">
                    <img class="item4" src="assets/images/item-background/item16.png" alt="">
                    <img class="item5" src="assets/images/item-background/item17.png" alt="">
                    <img class="item6" src="assets/images/item-background/item5.png" alt="">
                    <img class="item7" src="assets/images/item-background/item15.png" alt="">
                    <img class="item8" src="assets/images/item-background/item2.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection