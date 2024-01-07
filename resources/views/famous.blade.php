<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Top 10 Famous Authors</h1>
    <div class="card-body">    
    @if(count($topAuthors) > 0)
        <table border="1" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Author Name</th>
                    <th>Total Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topAuthors as $key => $author)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $author->author_name }}</td>
                        <td>{{ $author->total_rating }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No authors available.</p>
    @endif
    </div>
</body>
</html>