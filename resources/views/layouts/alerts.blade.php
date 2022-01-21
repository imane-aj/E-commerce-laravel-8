@if ($errors->all())
    @foreach ($errors->all() as $error)
        <div class='alert alert-danger'>
        {{ $error }}
    @endforeach
@endif

@if (session()->has('Succes'))
    <div class="alert alert-success alert-dismissbile fade show" role="alert">
        <strong>{!! session()->get('Success')!!}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" 
            aria-label="Close" style="float: right"></button>
    </div>  
@endif

@if (session()->has('errorLink'))
    <div class="alert alert-danger alert-dismissbile fade show" role="alert">
        <strong>{!! session()->get('errorLink') !!}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" 
            aria-label="Close" style="float: right"></button>
    </div>  
@endif

@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissbile fade show" role="alert">
        <strong>{{ session()->get('warning')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" 
        aria-label="Close" style="float: right"></button>
    </div>  
@endif

@if (session()->has('info'))
    <div class="alert alert-info alert-dismissbile fade show" role="alert">
        <strong>{{ session()->get('info')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" 
        aria-label="Close" style="float: right"></button>
    </div>  
@endif