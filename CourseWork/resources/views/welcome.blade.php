<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<ul>
    @foreach($owners as $owner)
        <li>{{$owner->name}}</li>
        @endforeach
</ul>
</body>
</html>
