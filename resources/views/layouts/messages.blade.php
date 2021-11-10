@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p class="">{{ $error }}</p>
        @endforeach
    </div>
@endif

