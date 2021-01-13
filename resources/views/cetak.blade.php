<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>
        My post title
    </p>
    <p>
        {{ $body }}
    </p>
    <p>
        with html tag <br>
        {!! nl2br($body) !!}
        {{-- nl2br = new line 2 <br> --}}
    </p>
</body>

</html>
