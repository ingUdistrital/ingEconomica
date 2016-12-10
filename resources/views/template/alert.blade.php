@if(Session::has('flash_message'))
    <div class="alert success">
        {{ Session::get('flash_message') }}
    </div>
@endif

@if($errors->any())
    <ul class="alert error">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

