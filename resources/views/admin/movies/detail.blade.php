<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AdminMovieDetail</title>
</head>

<body>
  <h2>{{$movie->title}}</h2>
  <img src="{{$movie->image_url}}" alt="">
  <p>{{$movie->published_year}}</p>
  <p>{{$movie->description}}</p>
  <p>{{$movie->is_showing ? "上映中" : "上映予定"}}</p>
  @foreach ($schedules as $schedule)
  <p><a href='/admin/schedules/{{$schedule->id}}'>{{$schedule->start_time}}~{{$schedule->end_time}}</a></p>
  @endforeach

  <a href='/admin/movies/{{$movie->id}}/schedules/create'>新規登録</a>
</body>

</html>