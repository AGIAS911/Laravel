<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses List</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f9f9f9; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #059669; color: white; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>

    <h2>Courses Directory</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Credits</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->code }}</td>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->credits }} hrs</td>
                    <td>{{ $c->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>