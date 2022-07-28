<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
<form action="">
    <input name="id" value="{{$movie->id}}">
    <input name="title" value="{{$movie->title}}">
    <input name="image_url" value="{{$movie->image_url}}">
    <input name="published_year" value="{{$movie->published_year}}">
    <input name="is_showing" type="checkbox" @checked($movie->is_showing) value="1">{{$movie->is_showing?"上映中":"上映予定"}}
    <input name="description" value="{{$movie->description}}">
    <input name="created_at" value="{{$movie->created_at}}">
    <input name="updated_at" value="{{$movie->updated_at}}">
</form>
</body>
</html>
