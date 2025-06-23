{{-- resources/views/notifications/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Your Notifications')

@section('content')
    <h1 style="text-align: center; color: #007bff;">Your Notifications</h1>

    <div style="margin-bottom: 30px;">
        <h2 style="font-size: 1.5em; border-bottom: 1px solid #eee; padding-bottom: 10px;">Unread Notifications</h2>
        @if ($unreadNotifications->isEmpty())
            <p>You have no new notifications.</p>
        @else
            <form action="{{ route('notifications.markAllAsRead') }}" method="POST" style="margin-bottom: 15px;">
                @csrf
                <button type="submit" style="background-color: #007bff; color: white; padding: 8px 15px; border-radius: 5px; border: none; cursor: pointer;">Mark All as Read</button>
            </form>
            <ul>
                @foreach ($unreadNotifications as $notification)
                    <li style="margin-bottom: 10px; padding: 10px; background-color: #f0f8ff; border-left: 5px solid #007bff; list-style-type: none;">
                        <p><strong>{{ $notification->data['message'] }}</strong></p>
                        <small>Received: {{ $notification->created_at->diffForHumans() }}</small>
                        <br>
                        <a href="{{ $notification->data['url'] }}" style="color: #007bff; text-decoration: none;">View Item</a>
                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display: inline-block; margin-left: 15px;">
                            @csrf
                            <button type="submit" style="background-color: #6c757d; color: white; padding: 5px 10px; border-radius: 4px; border: none; cursor: pointer; font-size: 0.8em;">Mark as Read</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div>
        <h2 style="font-size: 1.5em; border-bottom: 1px solid #eee; padding-bottom: 10px;">All Notifications</h2>
        @if ($allNotifications->isEmpty())
            <p>You have no notifications yet.</p>
        @else
            <ul>
                @foreach ($allNotifications as $notification)
                    <li style="margin-bottom: 10px; padding: 10px; background-color: {{ $notification->read_at ? '#f8f8f8' : '#e6f7ff' }}; border-left: 5px solid {{ $notification->read_at ? '#ccc' : '#007bff' }}; list-style-type: none;">
                        <p>{{ $notification->data['message'] }}</p>
                        <small>Received: {{ $notification->created_at->diffForHumans() }}
                            @if ($notification->read_at)
                                (Read {{ $notification->read_at->diffForHumans() }})
                            @else
                                (Unread)
                            @endif
                        </small>
                        <br>
                        <a href="{{ $notification->data['url'] }}" style="color: #007bff; text-decoration: none;">View Item</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection