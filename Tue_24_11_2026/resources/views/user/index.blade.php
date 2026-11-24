<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container bg-white p-4 rounded shadow-sm">
    <!-- Header & Create Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="m-0">Users List</h3>
        <a href="{{route('createUser')}}" class="btn btn-primary">
    <i class="bi bi-person-plus-fill me-1"></i> Create New User
</a>
    </div>

    <!-- Users Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle border">
            <thead class="table-dark">
                <tr>
                   
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach($users as $user)
                <tr>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                     <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Update / Edit Button -->
                                <a href="{{route('update',$user->id)}}" class="btn btn-sm btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- Delete Button (Form for DELETE method) -->
                                <form action="{{route('deleteUser',$user->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                </tr>
                @endforeach
               
                      
                    </tr>
                    
            </tbody>
        </table>
    </div>
</div>

</body>
</html>