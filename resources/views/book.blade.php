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

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif


    <div class="card-body">
        <form>
            <form method="GET" action="{{ url('/') }}">
                <div class="form-group row">
                    <label for="list" class="col-sm-2 col-form-label">List Shown</label>
                    <div class="col-sm-10">
                        <select name="pagination" id="page" class="custom-select">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Search</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="search" name="search" value="{{ request('search') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
           </form>
           
           <table class="table table-bordered">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Book Name</th>
                       <th>Category Name</th>
                       <th>Author Name</th>
                       <th>Average Rating</th>
                       <th>Voter</th>
                   </tr>
               </thead>
               <tbody>
                @php
                    $startIndex = ($books->currentPage() - 1) * $books->perPage() + 1;
                @endphp
                   @foreach($books as $book)
                       <tr>
                           <td>{{ $startIndex++ }}</td>
                           <td>{{ $book->book_name }}</td>
                           <td>{{ $book->category->category_name }}</td>
                           <td>{{ $book->author->author_name }}</td>
                           <td>{{ number_format($book->avgVotes(), 2) }}</td>
                           <td>{{ $book->sumVotes() }}</td>
                       </tr>
                   @endforeach
               </tbody>
           </table>

            <a href="{{ url('/top-authors') }}">Go to List Top 10 Page</a>
            <a href="{{ route('ratingForm') }}">Input Rating</a>
           
           {{ $books->appends(request()->input())->links() }}
           
           <script>
               document.getElementById('page').addEventListener('change', function() {
                   var selectedValue = this.value;
                   window.location.href = '{{ url('/top-books') }}?pagination=' + selectedValue;
               });
           </script>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    document.getElementById('page').addEventListener('change', function() {
        var selectedValue = this.value;
        window.location.href = '{{ url('/') }}?page=' + selectedValue;
    });
</script>
</body>
</html>