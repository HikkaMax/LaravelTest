<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
@csrf
<ul>
    @foreach($items as $item)
        <li>{{$item->name}}</li>
    @endforeach
</ul>
</body>
</html>
