@extends('admin.admin_dashboard')

@section('admin')
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
                                    <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
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

<!-- Add User Modal -->
@include('admin.admin_account_management.modals.admin_user_table_modal')


@endsection
