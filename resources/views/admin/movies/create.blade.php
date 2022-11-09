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
    <form action="store" method="post">
      @csrf
      <tr>
        <td>
          <input type="text" name="title" placeholder="タイトル" required>
        </td>
        <td>
          <input type="text" name="image_url" placeholder="画像URL" required>
        </td>
        <td>
          <input type="text" name="published_year" placeholder="公開年" required>
        </td>
        <td>
          <input type="checkbox" name="is_showing" required>
        </td>
        <td>
          <textarea name="description" cols="30" rows="10" placeholder="概要" required></textarea>
        </td>
        <td>
          <input type="submit" value="登録">
        </td>
      </tr>
    </form>
  </table>
</body>

</html>