@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">   
        {{ Session::get('error') }}
    </div>
@endif

@if (Session::has('susscess'))
    <div class="alert alert-susscess" style="background-color: green; font-size: 16px; color: white">   
        {{ Session::get('susscess') }}
    </div>
@endif