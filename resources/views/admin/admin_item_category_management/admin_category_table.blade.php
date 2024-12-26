@extends('admin.admin_dashboard')

@section('admin')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Category Management</span></h3>
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
                    <h3 class="title">Category Table</h3>
                </div>
                <div class="box-body">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add category Button -->
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addcategoryModal">Add Category</button>
                    
                    <table class="table footable"
                           data-paging="true"
                           data-filtering="true"
                           data-sorting="true"
                           data-breakpoints='{ "xs": 480, "sm": 768, "md": 992, "lg": 1200, "xl": 1400 }'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->category_id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->category_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.category.destroy', $category->category_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No category found.</td>
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
<!-- Add category Modal -->
<div class="modal fade" id="addcategoryModal" tabindex="-1" aria-labelledby="addcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 150px;"> <!-- Adjust the top margin here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addcategoryModalLabel">Add New category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.category.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save category</button>
                </div>
            </form>            
        </div>
    </div>
</div>




@endsection
