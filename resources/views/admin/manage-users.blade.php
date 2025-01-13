<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-danger text-center">Manage Users</h1>

        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        <table class="table table-dark table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
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
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->is_admin)
                        <span class="badge bg-success">Admin</span>
                        @else
                        <span class="badge bg-secondary">User</span>
                        @endif
                    </td>
                    <td>
                        @if (!$user->is_admin)
                        <!-- Make Admin Button -->
                        <form action="{{ route('admin.users.makeAdmin', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-success">Make Admin</button>
                        </form>
                        @else
                        <!-- Revoke Admin Button -->
                        <form action="{{ route('admin.users.revokeAdmin', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-danger">Revoke Admin</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>