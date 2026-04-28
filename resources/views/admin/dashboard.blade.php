<link rel="stylesheet" href="{{ asset('assets/admin.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<div class="sidebar">
  <a class="active" href="{{ url('/admin') }}">All Posts</a>
  <a href="{{ url('/post-new') }}">New Post</a>
  {{-- <a href="#contact">Edit/Delete</a>
  <a href="#about">Quit</a> --}}
</div>

<br>
@if(session('status'))
    <h4 style="color: green;" class="text-center">{{ session('status') }}</h4>
@endif

<div class="content">

  <br>

  <div class="container">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">

        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Post Title</th>
      <th scope="col">Content</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>@php echo substr($post->content, 0, 200); @endphp</td>
      <td><img src="{{ asset('storage/documents/'.$post->image_url) }}" alt="" style="max-height: 100px;"></td>
    </tr>
    @endforeach

  </tbody>
</table>
        
      </div>
      <div class="col-1"></div>
    </div>
  </div>



</div>