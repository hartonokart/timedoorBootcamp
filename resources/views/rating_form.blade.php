<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Rating Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="card-body">      
        <h1>Submit Rating Form</h1>
    
        <form action="{{ route('submitRating') }}" method="post">
            @csrf
    
            <label for="author_id">Author:</label>
            <select name="author_id" id="author_id" class="custom-select">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                @endforeach
            </select>
    
            <br>
    
            <label for="book_id">Book:</label>
            <select name="book_id" id="book_id" class="custom-select">
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                @endforeach
            </select>
    
            <br>
    
            <label for="rating">Rating :</label>
            <input class="custom-select" type="number" name="rating" id="rating" min="1" max="10" required>
    
            <br>
            <br>
            <button type="submit" class="btn btn-primary mb-2">Submit Rating</button>
        </form>  
    </div>
</body>
</html>
