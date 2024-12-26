@extends('staff.staff_dashboard')

@section('staff')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Users Management</span></h3>
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
                    <h3 class="title">Users Table</h3>
                </div>
                <div class="box-body">
                    <!-- Add User Button -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
                    
                    <table class="table footable"
                           data-paging="true"
                           data-filtering="true"
                           data-sorting="true"
                           data-breakpoints='{ "xs": 480, "sm": 768, "md": 992, "lg": 1200, "xl": 1400 }'>
                        <thead>
                            <tr>
                                <th data-name="id" data-type="number">ID</th>
                                <th data-name="Name">Name</th>
                                <th data-name="ID Number">ID Number</th>
                                <th data-breakpoints="xs" data-name="Email">Email</th>
                                <th data-breakpoints="xs" data-name="Role">Role</th>
                                <th data-breakpoints="xs sm" data-name="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->id_number ?? 'N/A' }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('staff.user.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('staff.user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('staff.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No users found.</td>
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
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 150px;"> <!-- Adjust the top margin here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('staff.user.create') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_number" class="form-label">ID Number</label>
                        <input type="text" class="form-control" id="id_number" name="id_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save User</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
