<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException; // For explicit throwing if needed
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse; // <--- ADD THIS LINE!

class PostController extends Controller
{
    // Constructor to apply middleware or policy checks
    public function __construct()
    //public function store(StorePostRequest $request) // This line is commented out, good.
    {
        // For API routes, 'auth:sanctum' is usually handled in routes/api.php
        // For web routes, 'auth' middleware is appropriate.
        // If this controller serves both web and API, ensure correct middleware is applied.
        // If 'api/posts' routes are in routes/api.php and use auth:sanctum,
        // this 'auth' middleware will apply to your web routes for 'posts' as well.
        $this->middleware('auth')->except(['index', 'show', 'apiIndex']); // Added apiIndex
    }

    public function apiIndex() // This is your API GET /api/posts
    {
        $posts = Post::with('user')->get();
        return response()->json($posts);
    }


    // This method will handle POST requests to /api/posts IF your route is configured for it.
    public function store(Request $request): JsonResponse // <--- Ensure JsonResponse return type
    {
        // 1. Validate the incoming request data
        // Validator facade requires its import which you have!
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            // Add any other fields your 'posts' table has
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        // 2. Create the post
        // Using auth()->id() is correct for the authenticated user via Sanctum
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(), // Assuming posts belong to authenticated users
        ]);

        // 3. Return a success response
        return response()->json([
            'message' => 'Post created successfully!',
            'post' => $post
        ], 201); // 201 Created
    }

    public function index()
    {
        $perPage = request()->input('per_page', 15);
        $posts = Post::with('user')->paginate($perPage);
        if (request()->wantsJson()) {
            // Laravel's JsonResource::collection (when used with ->paginate()) automatically handles
            // the pagination metadata in the JSON response format.
            return \App\Http\Resources\PostResource::collection($posts)->response();
        }
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        if (request()->wantsJson()) {
            return new \App\Http\Resources\PostResource($post);
        }
        return view('posts.show', compact('post'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        if (request()->wantsJson()) {
            return new \App\Http\Resources\PostResource($post);
        }
        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Post deleted successfully.',
                'post' => new \App\Http\Resources\PostResource($post),
            ]);
        }
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

