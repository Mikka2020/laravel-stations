<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AdminMovie</title>
</head>

<body>
  <h2>{{$movie->title}}</h2>
  @foreach ($schedules as $schedule)
  <p><a href='/admin/schedules/{{$schedule->id}}'>{{$schedule->start_time}}~{{$schedule->end_time}}</a></p>
  <form>
    @csrf
    <button type="submit" formaction='/admin/schedules/{{$schedule->id}}/edit' formmethod="get">編集</button>
  </form>
  <form method="post" action='/admin/schedules/{{$schedule->id}}/destroy'>
    @method('DELETE')
    @csrf
    <button type="submit">削除</button>
  </form>
  @endforeach
</body>

</html>