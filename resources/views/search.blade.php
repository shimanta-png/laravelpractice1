<x-header />

<br>

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <table class="table">
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/documents/' . $post->image_url) }}" alt="" style="max-height: 100px;">
                        </td>
                        <td>
                            <a href="{{ url('/post/'.$post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <div class="col-2"></div>
    </div>
</div>



<x-footer />