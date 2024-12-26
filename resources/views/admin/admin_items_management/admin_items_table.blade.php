@extends('admin.admin_dashboard')

@section('admin')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Item Management</span></h3>
            </div>
        </div>
        <!-- Page Heading End -->
    </div>
    <!-- Page Headings End -->
    
    <div class="row">
        <!-- Basic Table Start -->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Item Table</h3>
                </div>
                <div class="box-body">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add Item Button -->
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addItemModal">Add Item</button>
                    
                    <table class="table footable"
                        data-paging="true"
                        data-filtering="true"
                        data-sorting="true"
                        data-breakpoints='{ "xs": 480, "sm": 768, "md": 992, "lg": 1200, "xl": 1400 }'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item Image</th>
                                <th>Item Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Laboratory</th>
                                <th>Quantity</th>
                                <th>Days</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->item_id }}</td>
                                <td>
                                    @if ($item->item_image)
                                        <img src="{{ asset($item->item_image) }}" alt="Item Image" style="width: 100px; height: 100px;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_description }}</td>
                                <td>{{ $item->category->category_name }}</td> <!-- Display category name -->
                                <td>{{ $item->laboratory->lab_name }}</td> <!-- Display laboratory name -->
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->days }}</td>
                                <td>
                                    <a href="{{ route('admin.items.edit', $item->item_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.items.destroy', $item->item_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No items found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- Basic Table End -->
    </div>
</div>

<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 150px;"> <!-- Adjust the top margin here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="item_description" class="form-label">Item Description</label>
                        <textarea class="form-control" id="item_description" name="item_description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="laboratory_id" class="form-label">Laboratory</label>
                        <select class="form-select" id="laboratory_id" name="laboratory_id" required>
                            @foreach ($laboratories as $laboratory)
                                <option value="{{ $laboratory->lab_id }}">{{ $laboratory->lab_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="days" class="form-label">Days</label>
                        <input type="number" class="form-control" id="days" name="days" required>
                    </div>
                    <div class="mb-3">
                        <label for="item_image" class="form-label">Item Image</label>
                        <input type="file" class="form-control" id="item_image" name="item_image" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Item</button>
                </div>
            </form>            
        </div>
    </div>
</div>
@endsection
