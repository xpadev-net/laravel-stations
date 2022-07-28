<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
<p>{{$movie->id}}</p>
<p>{{$movie->title}}</p>
<img src="{{$movie->image_url}}">
<p>{{$movie->published_year}}</p>
<p>{{$movie->is_showing?"上映中":"上映予定"}}</p>
<p>{{$movie->description}}</p>
<p>{{$movie->created_at}}</p>
<p>{{$movie->updated_at}}</p>
<p><a href="/admin/movies/{{$movie->id}}/edit/">編集</a></p>
@foreach($movie->schedules as $schedule)
    <p>{{$schedule->start_time}} - {{$schedule->end_time}}</p>
@endforeach
</body>
</html>
