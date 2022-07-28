<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
<h1>{{$movie->title}}</h1>
<img src="{{$movie->image_url}}">
<p>{{$movie->published_year}}</p>
<div>{{$movie->description}}</div>
<ul>
    @foreach ($schedules as $schedule)
        <p>{{mb_substr($schedule->start_time,-8,5)}}</p>
        <p>{{mb_substr($schedule->end_time,-8,5)}}</p>
    @endforeach
</ul>
</body>
</html>
