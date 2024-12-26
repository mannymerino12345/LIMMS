@extends('staff.staff_dashboard')

@section('staff')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Edit Item</h3>
            </div>
        </div>
    </div>
    <!-- Page Headings End -->

    <div class="row">
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Edit Item Details</h3>
                </div>
                <div class="box-body">
                    <!-- Feedback Messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Edit Form -->
                    <form action="{{ route('staff.items.update', $item->item_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Item Name -->
                        <div class="mb-3">
                            <label for="item_name" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value="{{ $item->item_name }}" required>
                        </div>

                        <!-- Item Description -->
                        <div class="mb-3">
                            <label for="item_description" class="form-label">Item Description</label>
                            <textarea class="form-control" id="item_description" name="item_description" rows="3" required>{{ $item->item_description }}</textarea>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}" required>
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ $item->category_id == $category->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Laboratory -->
                        <div class="mb-3">
                            <label for="laboratory_id" class="form-label">Laboratory</label>
                            <select class="form-select" id="laboratory_id" name="laboratory_id" required>
                                <option value="">Select Laboratory</option>
                                @foreach($laboratories as $laboratory)
                                    <option value="{{ $laboratory->lab_id }}" {{ $item->laboratory_id == $laboratory->lab_id ? 'selected' : '' }}>
                                        {{ $laboratory->lab_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Item Image -->
                        <div class="mb-3">
                            <label for="item_image" class="form-label">Item Image</label>
                            <input type="file" class="form-control" id="item_image" name="item_image">
                            @if($item->item_image)
                                <img src="{{ asset('' . $item->item_image) }}" alt="Current Image" width="100" height="100" class="mt-2">
                                @else
                                <div class="mb-2">
                                    <p>No Image Available</p>
                                </div>
                            @endif
                        </div>

                        <!-- Days -->
                        <div class="mb-3">
                            <label for="days" class="form-label">Days</label>
                            <input type="number" class="form-control" id="days" name="days" value="{{ $item->days }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Item</button>
                        <a href="{{ route('staff.items.table') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
