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





<div class="content">

  <br>

  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">

        <form action="{{ url('/') }}/post-save" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Post Content</label>
            <textarea class="form-control" name="content" id="exampleTextarea" rows="5"></textarea>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">featured image</label>
            <input class="form-control" type="file" name="formfile" id="formFile">
          </div>
          <div class="mb-3">
            <select class="form-select" name="status" aria-label="Default select example">
              <option value="1" selected>published</option>
              <option value="0">draft</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
      <div class="col-2"></div>
    </div>
  </div>



</div>