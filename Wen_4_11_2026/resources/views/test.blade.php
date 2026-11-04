<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($array as $e)
    <h1>{{$e}}</h1>
    @endforeach
    <br>
    {{$name->name}}<br>
    {{$name->email}}<br>
    {{$name->email_verified_at}}<br>
</body>
</html>