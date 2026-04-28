<x-header />

<br>
@if(isset($status) && $status == false)
    <h4>login failed</h4>
@elseif (isset($status) && $status == true)
    <h4>login ok</h4>
@endif
<br>

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <form action="{{ url('/login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>
        <div class="col-2"></div>
    </div>
</div>



<x-footer />