<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
<table>
    @foreach ($sheets as $row)
        <tr>
            @foreach($row as $sheet)
                @if(@$sheet["reserved"])
                    <td class="disabled" >{{$sheet["row"]}}-{{$sheet["column"]}}</td>
                @else
                    <td><a href="./reservations/create?date={{date("Y-m-d")}}&sheetId={{$sheet["id"]}}">{{$sheet["row"]}}-{{$sheet["column"]}}</a></td>
                @endif
            @endforeach
        </tr>
    @endforeach
</table>
</body>
</html>
<style>
    .disabled{
        background: #999999;
    }
</style>
