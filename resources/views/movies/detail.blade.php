<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Movie</title>
</head>

<body>
  <h1>Movie</h1>
  <h2>{{ $movie->title }}</h2>
  <p>{{ $movie->description }}</p>
  <p>{{ $movie->published_year }}</p>
  <p>{{ $movie->is_showing ? '公開中' : '公開予定' }}</p>
  <img src="{{ $movie->image_url }}" alt="">
  <h2>スケジュール</h2>
  <ul>
    @foreach ($schedules as $schedule)
    <li>{{ $schedule->start_time }}〜{{ $schedule->end_time }}</li>
    @endforeach
  </ul>
</body>

</html>