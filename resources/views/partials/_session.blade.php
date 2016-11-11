@if (Session::has('success'))

    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{ Session::get('success') }}
    </div>

@endif
@if (Session::has('rejected'))

    <div class="alert alert-danger" role="alert">
        <strong>Rejected:</strong> {{ Session::get('rejected') }}
    </div>

@endif