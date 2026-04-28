<x-header />

<div class="text-left">
    <br>
    <a href="{{ url()->previous() }}">
        <button class="btn btn-primary">
            back
        </button>
    </a>
</div>

@if(isset($post))
    <div class="container">
        <div class="row">
            @if(isset($post->image_url))
                <img src="{{ asset('storage/documents/' . $post->image_url) }}" class="img-fluid" alt="Responsive image"
                    style="margin-top: 10px;">
            @endif

            <br>
            <br>

            @if(isset($post->title))
            <h1>{{ $post->title }}</h1>@endif
            <br>
            @if(isset($post->content))
                <p>
                    {{ $post->content }}
                </p>
            @endif

        </div>
    </div>
@endif

<x-footer />