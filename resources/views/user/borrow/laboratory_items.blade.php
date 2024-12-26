@extends('user.user_dashboard')


@section('user_content')
<div class="flat-pages-title-home3">
    <div class="bg-grid-line">
        <div class="bg-line"></div>
    </div>
    
    <div class="themesflat-container w1346">
        
        <div class="row">
            <div class="col-md-3">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

            <div class="widget-category-checkbox style-1 mb-30">
                <h5 class="active">
                    <i class="fas fa-search"></i> Search
                </h5>
                <div class="search-container mb-4">
                    <div class="input-group">
                        <input type="text" id="search-bar" class="form-control" placeholder="Search for items...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="widget-category-checkbox style-1 mb-30">
                <h5 class="active"><i class="fa-solid fa-layer-group"></i> Categories</h5>
                <div class="content-wg-category-checkbox">
                    @foreach ($category as $cat)
                        <label>
                            {{$cat->category_name}}
                            <input type="checkbox" class="category-checkbox" data-category="{{$cat->category_id}}">
                            <span class="btn-checkbox"></span>
                        </label><br>
                    @endforeach
                </div>
            </div>

            </div>

            <div class="col-md-9">
                <div class="row" id="items-container">
                    @foreach ($items as $item)
                        <div class="fl-item-1 col-lg-4 col-md-6 item" data-category="{{ $item->category->category_id }}" style="display: block;">
                            <div class="tf-card-box style-4">
                                <div class="card-media">
                                    <a href="{{ route('view.items.show', $item->item_id) }}">
                                        <img src="{{ $item->item_image && file_exists(public_path($item->item_image)) 
                                            ? url($item->item_image) 
                                            : url('assets/images/avatar/avatar-07.png') }}" alt="">
                                    </a>
                                    <span class="wishlist-button icon-heart"></span>
                                </div>
                                <center>
                                    <a href="{{ route('view.items.show', $item->item_id) }}" style="text-decoration: none; color: inherit;">
                                        <h5 class="item-name">{{ $item->item_name }}</h5>
                                    </a>
                                </center>
                                <div class="meta-info flex items-center justify-between">
                                    <div>
                                        <span class="text-bid">Quantity</span>
                                        <h6 class="price gem"><i class="icon-gem"></i>{{ $item->quantity }}</h6>
                                    </div>
                                    <div class="button-place-bid">
                                        <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Custom Pagination -->
                <div class="col-12">
                    <div class="widget-pagination">
                        <ul class="justify-center">
                            <li>
                                <a href="{{ $items->previousPageUrl() }}">
                                    <i class="icon-keyboard_arrow_left"></i>
                                </a>
                            </li>
                            @foreach ($items->links()->elements[0] as $page => $url)
                                <li class="{{ $items->currentPage() == $page ? 'active' : '' }}">
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ $items->nextPageUrl() }}">
                                    <i class="icon-keyboard_arrow_right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('search-bar').addEventListener('input', function() {
        var searchQuery = this.value.toLowerCase();  // Get search query
        var items = document.querySelectorAll('.fl-item-1'); // Get all item elements

        items.forEach(function(item) {
            // Extract the item name from the .item-name element
            var itemName = item.querySelector('.item-name') ? item.querySelector('.item-name').textContent.toLowerCase() : '';

            // Show or hide items based on whether they match the search query
            if (itemName.includes(searchQuery)) {
                item.style.display = 'block';  // Show item if it matches search
            } else {
                item.style.display = 'none';  // Hide item if it doesn't match
            }
        });
    });
</script>

<script>
    // Wait for the DOM to load completely
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.category-checkbox');
        const itemsContainer = document.getElementById('items-container');
        const noItemsMessage = document.getElementById('no-items-message');

        // Listen for checkbox changes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // Get all selected categories
                const selectedCategories = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.getAttribute('data-category'));

                // Filter items based on selected categories
                filterItems(selectedCategories);
            });
        });

        // Function to filter items based on selected categories
        function filterItems(selectedCategories) {
            const items = itemsContainer.querySelectorAll('.item');
            let visibleItemsCount = 0;

            items.forEach(item => {
                const itemCategory = item.getAttribute('data-category');

                // Show item if its category is selected
                if (selectedCategories.length === 0 || selectedCategories.includes(itemCategory)) {
                    item.style.display = 'block';  // Show item
                    visibleItemsCount++;
                } else {
                    item.style.display = 'none';  // Hide item
                }
            });

            // Show or hide the "No items available" message
            if (visibleItemsCount === 0) {
                noItemsMessage.style.display = 'block';
            } else {
                noItemsMessage.style.display = 'none';
            }
        }
    });
</script>
@endsection