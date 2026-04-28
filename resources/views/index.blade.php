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
                        <img src="{{ asset('storage/documents/' . $post->image_url) }}" class="card-img-top" alt="..."
                            style="max-height: 300px;">

                    @endif
                    <div class="card-body">
                        <h6>{{ $post->title }}</h6>
                        <p class="card-text">@if($post->content)
                        {{ substr($post->content, 0, 100)  }}   
                        @endif</p>
                        <button class="btn btn-dark">read more</button>
                    </div>
                </div>
            </div>
        @endforeach



    </div>
</div>



<x-footer />