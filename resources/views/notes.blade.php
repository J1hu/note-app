<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
</head>

<body>
    <h1>NOTES PAGE</h1>

    <!-- Create Note button -->
    <form action="/create" method="GET">
        <button type="submit">Create Note</button>
    </form>

    @foreach ($notes as $note)
        <div><b>Title:</b> {{ $note->title }}</div>
        <div><b>Description:</b> {{ $note->description }}</div>
        <div><b>Content:</b> {{ $note->content }}</div>

        <!-- View Note button -->
        <form action="{{ route('viewNote', ['id' => $note->id]) }}" method="GET">
            <button type="submit">View Note</button>
        </form>
        <hr>
    @endforeach
</body>

</html>
