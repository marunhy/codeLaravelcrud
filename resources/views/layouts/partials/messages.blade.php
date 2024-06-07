@if (session('success'))
    <div class="mt-2">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif
