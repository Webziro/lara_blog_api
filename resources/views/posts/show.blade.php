<div class="post-meta" style="font-size: 0.9em; color: #777; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
    <p>Published: {{ $post->created_at->format('M d, Y H:i') }} by **{{ $post->user->name }}**</p> {{-- Display author name --}}
</div>

@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <a href="{{ route('posts.index') }}" style="display: inline-block; margin-bottom: 20px; color: #007bff; text-decoration: none;">&larr; Back to All Posts</a>

    <h1 style="color: #007bff;">{{ $post->title }}</h1>
    <div class="post-meta" style="font-size: 0.9em; color: #777; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
        <p>Published: {{ $post->created_at->format('M d, Y H:i') }}</p>
    </div>
    <div class="post-body" style="line-height: 1.8; color: #444;">
        <p>{{ $post->body }}</p>
    </div>

    <div class="actions" style="margin-top: 30px; text-align: center;">
        @can('update', $post)
            <a href="{{ route('posts.edit', $post->id) }}" style="display: inline-block; background-color: #ffc107; color: black; padding: 8px 12px; border-radius: 5px; text-decoration: none; margin-right: 10px;">Edit Post</a>
        @endcan
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" style="background-color: #dc3545; color: white; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer;">Delete Post</button>
            </form>
        @endcan
    </div>
@endsection