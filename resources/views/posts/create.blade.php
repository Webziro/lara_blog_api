

@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
    <h1 style="text-align: center; color: #007bff;">Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px; font-weight: bold;">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required style="width: calc(100% - 22px); padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em;">
            @error('title')
                <div class="error-message" style="color: #dc3545; font-size: 0.9em; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="body" style="display: block; margin-bottom: 5px; font-weight: bold;">Body:</label>
            <textarea id="body" name="body" required style="width: calc(100% - 22px); padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em; resize: vertical; min-height: 150px;">{{ old('body') }}</textarea>
            @error('body')
                <div class="error-message" style="color: #dc3545; font-size: 0.9em; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="text-align: center;">
            <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1em;">Create Post</button>
        </div>
    </form>
    <p style="text-align: center; margin-top: 20px;"><a href="{{ route('posts.index') }}" style="color: #007bff; text-decoration: none;">Back to All Posts</a></p>
@endsection