<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Note</title>
</head>

<body>
    <h1>Edit Note</h1>

    <form action="{{ route('updateNote', ['id' => $note->id]) }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $note->title }}" required><br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ $note->description }}" required><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="4" required>{{ $note->content }}</textarea><br>

        <button type="submit">Update Note</button>
    </form>

    <!-- Back button -->
    <form action="{{ route('index') }}" method="GET">
        <button type="submit">Back to Notes</button>
    </form>
</body>

</html>
