
@if (count($errors) > 0)
    @foreach ($errors->all() as $error) <!--all() because the object has arrays as values-->
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class='alert alert-success'>
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class='alert alert-danger'>
        {{session('error')}}
    </div>
@endif