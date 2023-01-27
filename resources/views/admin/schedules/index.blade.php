<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AdminMovie</title>
</head>

<body>
  @foreach ($movies as $movie)
  <!-- スケジュールがない映画は表示しない -->
  @if ($movie->schedules->isEmpty())
  @continue
  @endif
  <!-- スケジュールがある映画のみ表示 -->
  <h2>{{$movie->id}}{{$movie->title}}</h2>
  @foreach ($schedules as $schedule)
  @if ($schedule->movie_id == $movie->id)
  <a href='/admin/schedules/{{$schedule->id}}'>
    <p>{{$schedule->id}}</p>
    <p>{{$schedule->start_time}}~{{$schedule->end_time}}</p>
    <p>{{$schedule->created_at}}</p>
    <p>{{$schedule->updated_at}}</p>
  </a>
  @endif
  @endforeach
  @endforeach

  <!-- スケジュール登録 -->
  <a href='/admin/movies/{{$movie->id}}/schedules/create'>新規登録</a>
</body>

</html>