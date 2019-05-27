@if (session()->has('message'))
        <div class="alert alert-{{ session('message_type') }}">{{ session('message') }}</div>
@endif