@if(Session::has('success'))
    <div class="alert alert-success alert_st">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('error_extension'))
    <div class="alert alert-danger alert_st">
        {{Session::get('error_extension')}}
    </div>
@endif