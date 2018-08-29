
@if (count($errors) > 0)
    @foreach ($errors->all() as $error) <!--all() because the object has arrays as values-->
        <div class="alert alert-danger">
            {{$error}} <!-- Errors from validations (not sessions) -->
        </div>
    @endforeach
@endif

@if (session('success'))
    <div id='successMsg' class='alert alert-success'>
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div id='errorMsg' class='alert alert-danger'>
        {{session('error')}}
    </div>
@endif

<script>
    if($('#successMsg').length){
        setTimeout(function() {
            $('#successMsg').addClass('d-none');
        }, 2000)
    }else if($('#errorMsg').length){
        setTimeout(function() {
            $('#errorMsg').addClass('d-none');
        }, 2000)
    }
</script>