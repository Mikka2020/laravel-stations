<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AdminMovie</title>
</head>

<body>
  <table border="2">
    <tr>
      <th>タイトル</th>
      <th>画像</th>
      <th>公開年</th>
      <th>上映中かどうか</th>
      <th>概要</th>
    </tr>
    @foreach ($movies as $movie)
    <tr>
      <td>{{ $movie->title }}</td>
      <td><img src="{{$movie->image_url}}" alt=""></td>
      <td>{{ $movie->published_year }}年</td>
      <td>{{ $movie->is_showing ? "上映中" : "上映予定"; }}</td>
      <td>{{ $movie->description }}</td>
    </tr>
    @endforeach
  </table>
</body>

</html>