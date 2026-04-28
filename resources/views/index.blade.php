<x-header />

<br>
<br>

<div class="container">
    <div class="row">

        @foreach ($posts as $post)
            <div class="col-lg-4" style="margin-bottom: 20px;">
                <div class="card" style="width: 18rem;">
                    @if(is_null($post->image_url))
                        <img src="assets/noimg.jpg" class="card-img-top" alt="..." style="max-height: 195px;">
                    @else
                        <img src="{{ asset('storage/documents/' . $post->image_url) }}" class="card-img-top" alt="..." style="max-height: 300px;">
                    @endif
                    <div class="card-body">
                        <h6>{{ $post->title }}</h6>
                        <p class="card-text">@if($post->content)
                        {{ substr($post->content, 0, 100)  }}   
                        @endif</p>
                        <a href="{{ url('/post/'.$post->slug) }}">
                            <button class="btn btn-dark">read more</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        <div>
            {{-- <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="{{ url('/') }}?page=1">1</a></li>
                <li class="page-item"><a class="page-link" href="{{ url('/') }}?page=2">2</a></li>
                <li class="page-item"><a class="page-link" href="{{ url('/') }}?page=3">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav> --}}
            {{ $posts->links() }}
        </div>    

    </div>
</div>



<x-footer />