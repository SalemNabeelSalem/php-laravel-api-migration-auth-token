<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>

<body>
    <div style="text-align: center; background-color: #f5f5f5">
        <h1 style="padding-top: 20px">All Books</h1>

        @foreach ($books as $book)
            <div style="width: 300px; display: inline-block; margin: 20px; border: 1px solid #ccc; padding: 10px;">
                <h3>{{ $book['title'] }}</h3>

                <p>{{ $book['author'] }}</p>
            </div>
        @endforeach
    </div>

    {{--
    <div style="text-align: center; background-color: #f5f5f5">
        <h1>Create New Book</h1>

        <form action="'/books" method="post">
            @csrf
            <input type="text" name="title" placeholder="Title">
            <input type="text" name="author" placeholder="Author">
            <button type="submit">Submit</button>
        </form>
    </div>
    --}}
</body>

</html>
