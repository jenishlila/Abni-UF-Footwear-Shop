@if( Session::has('success'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert"></button>
    <strong>{{ session('success')}}</strong>
</div>
@endif

@if( Session::has('warning'))
<div class="alert alert-warning">
    <button class="close" data-dismiss="alert"></button>
    <strong>{{ session('warning')}}</strong>
</div>
@endif

@if( Session::has('error'))
<div class="alert alert-danger">
    <button class="close" data-dismiss="alert"></button>
    <strong>{{ session('error')}}</strong>
</div>
@endif

@if( Session::has('status'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert"></button>
    <strong>{{ session('status')}}</strong>
</div>
@endif