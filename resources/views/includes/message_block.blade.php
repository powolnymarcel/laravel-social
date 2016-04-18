@if($errors->has())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger error">{{ $error }}</div>
    @endforeach
@endif


@if(Session::has('message'))

<div class="alert alert-success success ">{{Session::get('message')}}</div>

@endif
