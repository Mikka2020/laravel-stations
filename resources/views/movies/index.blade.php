<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Movie</title>
</head>

<body>
  <article>
    <h2>検索</h2>
    <form action="/movies" method="get">
      @csrf
      <input type="text" name="keyword" value=""><br>
      <input type="radio" name="is_showing" value="" checked>すべて<br>
      <input type="radio" name="is_showing" value="0">公開予定<br>
      <input type="radio" name="is_showing" value="1">公開中<br>
      <button type="submit">検索</button>
    </form>
  </article>

  @foreach ($movies as $movie)
  <ul>
    <li>{{ $movie->title }}</li>
    <li><img src="{{$movie->image_url}}" alt="{{$movie->title}}"></li>
  </ul>
  @endforeach
</body>

</html>