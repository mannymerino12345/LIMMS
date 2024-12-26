<h1>Users List</h1>
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Add User</a> <!-- Replace with actual route -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ID Number</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->id_number }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-info">View</a> <!-- Replace with actual route -->
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning">Edit</a> <!-- Replace with actual route -->
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
