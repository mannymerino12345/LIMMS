@extends('user.user_dashboard')

@section('user_content')

<div class="themesflat-container">
    <div class="row">
        <div data-wow-delay="0s" class="wow fadeInLeft col-md-6">
            <div class="tf-card-box style-5 mb-0">
                <div class="card-media mb-0">
                    <a href="#">
                        <img src="{{ $item->item_image && file_exists(public_path($item->item_image)) 
                            ? url($item->item_image) 
                            : url('assets/images/avatar/avatar-07.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div data-wow-delay="0s" class="wow fadeInRight infor-product">
                <div class="text">{{ $item->category->category_name ?? 'No Category' }}<span class="icon-tick"><span class="path1"></span><span class="path2"></span></span></div>
                <h2>Name: {{ $item->item_name }}</h2>
            </div>
            <div data-wow-delay="0s" class="wow fadeInRight product-item time-sales">
                <h6><i class="fa-solid fa-box"></i> Item Status</h6>
                <form id="borrowForm" action="{{ route('borrow.item', $item->item_id) }}" method="POST" class="content p-3 bg-light rounded shadow">
                    @csrf
                    <p class="mb-3">
                        <strong>ITEM LEFT:</strong> {{ $item->quantity }}
                    </p>
                
                    <div class="mb-3">
                        <label for="bidQuantity" class="form-label"><strong>Enter Quantity to Borrow:</strong></label>
                        <input 
                            type="number" 
                            id="bidQuantity" 
                            name="bid_quantity" 
                            class="form-control" 
                            placeholder="Enter quantity" 
                            min="1" 
                            max="{{ $item->quantity }}" 
                            required>
                    </div>
                
                    <div class="text-center">
                        <!-- Replace the button with the link -->
                        <a href="#" id="borrowLink" class="tf-button">Borrow Item</a>
                    </div>
                </form>                
            </div>            
            <div data-wow-delay="0s" class="wow fadeInRight product-item description">
                <h6><i class="icon-description"></i>Description</h6>
                <i class="icon-keyboard_arrow_down"></i>
                <div class="content">
                    <p>{{ $item->item_description }}</p>
                </div>
            </div>
        </div>  
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('borrowLink').addEventListener('click', function(event) {
        // Prevent the link from navigating immediately
        event.preventDefault();
        
        // Get the value of the input field
        var bidQuantity = document.getElementById('bidQuantity').value;
        
        // Get the available quantity from the server-side data
        var availableQuantity = {{ $item->quantity }};
        
        // Check if the input field is empty or less than 1
        if (bidQuantity === "" || bidQuantity < 1) {
            // Show SweetAlert warning if input is invalid
            Swal.fire({
                title: 'Input Error!',
                text: "Please enter a valid quantity to borrow.",
                icon: 'error',
                confirmButtonText: 'Okay',
                customClass: {
                    popup: 'swal-popup-large',
                    title: 'swal-title-large',
                    content: 'swal-content-large'
                }
            });
        }
        // Check if the input quantity exceeds available quantity
        else if (bidQuantity > availableQuantity) {
            // Show SweetAlert warning if input quantity exceeds available stock
            Swal.fire({
                title: 'Quantity Exceeded!',
                text: "You cannot borrow more than the available quantity (" + availableQuantity + ").",
                icon: 'error',
                confirmButtonText: 'Okay',
                customClass: {
                    popup: 'swal-popup-large',
                    title: 'swal-title-large',
                    content: 'swal-content-large'
                }
            });
        } else {
            // If input is valid and within the available quantity, show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to borrow this item?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, borrow it!',
                cancelButtonText: 'No, cancel',
                reverseButtons: true,
                customClass: {
                    popup: 'swal-popup-large',  // Custom class for the popup size
                    title: 'swal-title-large',   // Custom class for the title size
                    content: 'swal-content-large' // Custom class for the content size
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks 'Confirm', submit the form
                    document.getElementById('borrowForm').submit(); // Submit the form to borrow the item
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // If the user clicks 'Cancel', show cancellation alert
                    Swal.fire(
                        'Cancelled',
                        'You cancelled the borrowing request.',
                        'error'
                    );
                }
            });
        }
    });
</script>

<style>
    /* Increase the size of the SweetAlert2 popup */
.swal-popup-large {
    width: 600px !important; /* Adjust the width */
    font-size: 18px !important; /* Adjust the font size */
}

/* Increase the size of the title */
.swal-title-large {
    font-size: 24px !important; /* Adjust the title size */
}

/* Increase the size of the content text */
.swal-content-large {
    font-size: 16px !important; /* Adjust the content size */
}

/* Optional: Make the buttons a bit larger */
.swal2-confirm, .swal2-cancel {
    padding: 12px 30px !important; /* Adjust the button padding */
    font-size: 16px !important; /* Adjust the button text size */
}

</style>

@endsection
