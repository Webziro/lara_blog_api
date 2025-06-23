@props(['type' => 'info', 'message']) {{-- Define available props and their defaults --}}

<div class="alert alert-{{ $type }}">
    {{ $message }}
    {{ $slot }} {{-- This will render any content passed between the component's tags --}}
</div>