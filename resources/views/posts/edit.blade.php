
@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 style="text-align: center; color: #007bff;">Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px; font-weight: bold;">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required style="width: calc(100% - 22px); padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em;">
            @error('title')
                <div class="error-message" style="color: #dc3545; font-size: 0.9em; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="body" style="display: block; margin-bottom: 5px; font-weight: bold;">Body:</label>
            <textarea id="body" name="body" required style="width: calc(100% - 22px); padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em; resize: vertical; min-height: 150px;">{{ old('body', $post->body) }}</textarea>
            @error('body')
                <div class="error-message" style="color: #dc3545; font-size: 0.9em; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="text-align: center;">
            <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1em;">Update Post</button>
        </div>
    </form>
    <p style="text-align: center; margin-top: 20px;"><a href="{{ route('posts.show', $post->id) }}" style="color: #007bff; text-decoration: none;">Back to Post</a> | <a href="{{ route('posts.index') }}" style="color: #007bff; text-decoration: none;">Back to All Posts</a></p>
@endsection