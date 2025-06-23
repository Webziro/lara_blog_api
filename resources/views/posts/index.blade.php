 @extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <h1 style="text-align: center; color: #007bff;">All Blog Posts</h1>

    <div class="create-link" style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('posts.create') }}" style="background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 1.1em;">Create New Post</a>
    </div>

    @if ($posts->isEmpty())
        <p style="text-align: center; margin-top: 20px;">No posts yet. Why not create one?</p>
    @else
        @foreach ($posts as $post)

        <div class="post-card" style="border: 1px solid #eee; border-radius: 5px; padding: 15px; margin-bottom: 20px; background-color: #fefefe; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
            <h2>{{ $post->title }}</h2>
            <p>{{ Str::limit($post->body, 150) }}</p>
            <p><small>Created: {{ $post->created_at->format('M d, Y H:i') }} by **{{ $post->user->name }}**</small></p> {{-- Display author name --}}

        </div>

            <div class="post-card" style="border: 1px solid #eee; border-radius: 5px; padding: 15px; margin-bottom: 20px; background-color: #fefefe; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
                <h2>{{ $post->title }}</h2>
                <p>{{ Str::limit($post->body, 150) }}</p>
                <p><small>Created: {{ $post->created_at->format('M d, Y H:i') }}</small></p>
                <div class="actions" style="margin-top: 15px;">
                    <a href="{{ route('posts.show', $post->id) }}" style="display: inline-block; background-color: #007bff; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none; margin-right: 10px;">View</a>
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post->id) }}" style="display: inline-block; background-color: #ffc107; color: black; padding: 8px 12px; border-radius: 5px; text-decoration: none; margin-right: 10px;">Edit</a>
                    @endcan
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" style="background-color: #dc3545; color: white; padding: 8px 12px; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach
    @endif
@endsection


