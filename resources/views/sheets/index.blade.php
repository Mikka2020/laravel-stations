<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sheet</title>
</head>

<body>
  <table border="1" cellspacing="10" cellpadding="10">
    <tr>
      <td></td>
      <td></td>
      <td>スクリーン</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    @foreach ($sheets as $sheet)
    @if ($sheet->column == 1)
    <tr>
      @endif
      <td>{{$sheet->row}}-{{$sheet->column}}</td>
      @if ($sheet->column == 5)
    </tr>
    @endif
    @endforeach
  </table>
</body>

</html>