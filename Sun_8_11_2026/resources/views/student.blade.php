<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f9f9f9; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #4f46e5; color: white; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>

    <h2>Students Directory</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Major</th>
            </tr>
        </thead>
        <tbody>
            @foreach($std as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->major }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>