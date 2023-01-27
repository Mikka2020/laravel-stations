<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AdminMovie</title>
</head>

<body>
  <form method="POST" action='/admin/schedules/{{$schedule->id}}/update'>
    @method('PATCH')
    @csrf
    <input type="hidden" name="movie_id" value="{{$movie->id}}">
    開始日付
    <input type="date" name="start_time_date" required>
    開始時間
    <input type="time" name="start_time_time" required><br>
    終了日付
    <input type="date" name="end_time_date" required>
    終了時間
    <input type="time" name="end_time_time" required><br>
    <button type="submit">送信</button>
  </form>
</body>

</html>