<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8 font-sans">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Users List</h1>
                <p class="text-gray-500 text-sm mt-1">View and manage registered system accounts</p>
            </div>
            <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Add New User +
            </a>
        </div>


        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="p-3 border">#</th>
                        <th class="p-3 border">Name</th>
                        <th class="p-3 border">Email</th>
                        <th class="p-3 border">Registration Date</th>
                        <th class="p-3 border text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 border text-gray-500">{{ $user->id }}</td>
                        <td class="p-3 border font-semibold text-gray-800">{{ $user->name }}</td>
                        <td class="p-3 border text-gray-600">{{ $user->email }}</td>
                        <td class="p-3 border text-sm text-gray-500">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="p-3 border">
                            <div class="flex justify-center items-center gap-2">

                                <a href="{{ route('users.show', $user->id) }}" class="bg-gray-600 text-white px-3 py-1 rounded text-sm hover:bg-gray-700 transition">
                                    View
                                </a>

                                <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 transition">
                                    Edit
                                </a>


                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">No registered users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

       
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</body>

</html>