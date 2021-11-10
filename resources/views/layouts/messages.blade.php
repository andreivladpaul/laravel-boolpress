@if (count($errors) > 0)
    <div class="alert">
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    </div>
@endif

