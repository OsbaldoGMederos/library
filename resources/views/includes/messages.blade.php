@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="my-2 alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="my-2 alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="my-2 alert alert-success">
        {{session('error')}}
    </div>
@endif