<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AdminMovieEdit</title>
</head>

<body>
  <table border="2">
    <tr>
      <th>タイトル</th>
      <th>画像</th>
      <th>公開年</th>
      <th>上映予定</th>
      <th>概要</th>
      <th>編集</th>
    </tr>
    <form action="update" method="post">
      @method('patch')
      @csrf
      <tr>
        <td>
          <input type="text" name="title" placeholder="タイトル" value="{{$movie->title}}" required>
        </td>
        <td>
          <input type="text" name="image_url" placeholder="画像URL" value="{{$movie->image_url}}" required>
        </td>
        <td>
          <input type="text" name="published_year" placeholder="公開年" value="{{$movie->published_year}}" required>
        </td>
        <td>
          <input type="checkbox" name="is_showing" value="{{$movie->is_showing}}">
        </td>
        <td>
          <textarea name="description" cols="30" rows="10" placeholder="概要" required>{{$movie->description}}</textarea>
        </td>
        <td>
          <button type="submit">変更</button>
        </td>
      </tr>
    </form>
  </table>
</body>

</html>