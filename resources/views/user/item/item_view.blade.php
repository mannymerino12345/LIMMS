@extends('user.user_dashboard')

@section('user_content')
<div class="flat-title-page">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-12">
                <h1 class="heading text-center">Request Items</h1>
                <ul class="breadcrumbs flex justify-center">
                    <li class="icon-keyboard_arrow_right">
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="#">Creators</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="tf-section-2 ranking">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-12 mb-30">
                <div class="widget-tabs relative">
                
                    <div class="widget-content-tab pt-10">
                        <div class="widget-content-inner active">
                            <div class="widget-table-ranking">
                                <div data-wow-delay="0s" class="wow fadeInUp table-ranking-heading">
                                    <div class="column1">
                                        <h3>Item</h3>
                                    </div>
                                    <div class="column2">
                                        <h3>Borrow Date</h3>
                                    </div>
                                    <div class="column">
                                        <h3>Borrow Time</h3>
                                    </div>
                                    <div class="column">
                                        <h3>Due Date</h3>
                                    </div>
                                    <div class="column">
                                        <h3>Quantity</h3>
                                    </div>
                                    <div class="column">
                                        <h3>Status</h3>
                                    </div>
                                    <div class="column">
                                        
                                    </div>
                                </div>
                                <div class="table-ranking-content">
                                    @foreach ($transactions as $transaction)
                                        
                                    <div data-wow-delay="0s" class="wow fadeInUp fl-row-ranking">
                                        <div class="td1">
                                            <div class="item-rank">{{ $loop->iteration }}.</div>
                                            <div class="item-avatar">
                                                <img src="{{ $transaction->item && $transaction->item->item_image && file_exists(public_path($transaction->item->item_image)) 
                                                ? url($transaction->item->item_image) 
                                                : url('assets/images/avatar/avatar-07.png') }}" alt="">
                                            </div>
                                            <div class="item-name">
                                                {{$transaction->item->item_name}}
                                            </div>
                                        </div>
                                        <div class="td2">
                                            <h6 class="price gem">
                                                {{$transaction->borrow_date}}
                                            </h6>
                                        </div>
                                        <div class="td3 danger">
                                            {{$transaction->borrow_time}}
                                        </div>
                                        
                                        <div class="td2">
                                            {{$transaction->due_date}}
                                        </div>
                                        <div class="td4 warning">
                                            {{$transaction->quantity}}
                                        </div>
                                        <div class="td7 warning">
                                            <h6 class="price gem">
                                                {{$transaction->status}}
                                            </h6>
                                        </div>
                                        <div class="td7">
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
