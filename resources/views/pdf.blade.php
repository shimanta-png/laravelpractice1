<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pdf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <h3 class="text-center">Posts Index</h3>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITLE</th>
                <th scope="col">CONTENT</th>
                <th scope="col">FEATURED IMAGE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ substr($post->content, 0, 100) }}</td>
                <td>
                    @if(is_null($post->image_url))
                        <img src="assets/noimg.jpg" class="card-img-top" alt="..." style="max-height: 50px;">
                    @else
                        <img src="{{ public_path('storage/documents/' . $post->image_url) }}" class="card-img-top" alt="..." style="max-height: 50px;">

                    @endif
                </td>
            </tr>      
            @endforeach
            
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>