@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
@endif

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
@if (Session::has('error'))
<div class="alert alert-danger">
    <ul>
        <li>{{ Session::get('error') }} </li>
    </ul>
</div>
@endif