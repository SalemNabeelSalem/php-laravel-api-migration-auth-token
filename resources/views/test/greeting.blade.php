<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Hello</title>
</head>

<body>
    @if ($age > 30)
        <h1 style='text-align:center; margin-top:20px;'>
            Hello {{ $name }}, your age is bigger than 30, and you live in {{ $cities[0] }}
        </h1>
    @elseif ($age < 30 && $age > 0)
        <h1 style='text-align:center; margin-top:20px;'>
            Hello {{ $name }}, your age is less than 30, and you live in {{ $cities[0] }}
        </h1>
    @elseif ($age == 30)
        <h1 style='text-align:center; margin-top:20px;'>
            Hello {{ $name }}, your age is equal 30, and you live in {{ $cities[0] }}
        </h1>
    @elseif ($age <= 0)
        <h1 style='text-align:center; margin-top:20px;'>
            Hello {{ $name }}, your age is equal or less to 0, and you live in {{ $cities[0] }}
        </h1>
    @endif

    <h1 style='text-align:center; margin-top:20px;'>
        @foreach ($cities as $city)
            {{ $city }}

            @if ($loop->last)
                !
            @else
                ,
            @endif
        @endforeach
    </h1>

    <ul>
        @for ($i = 0; $i < 10; $i++)
            <li>{{ $i + 1 }}</li>
        @endfor
    </ul>
</body>

</html>
