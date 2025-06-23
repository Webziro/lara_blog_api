<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post; // Import the Post model
use Illuminate\Auth\Access\Response; // Import Response for custom messages

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Any authenticated user can view any posts (index page)
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        // Any authenticated user can view a specific post
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Any authenticated user can create a post
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        // Only the user who owns the post can update it
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        // Only the user who owns the post can delete it
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        // We are not using soft deletes, so this isn't relevant for now.
        // For demonstration, let's deny by default.
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        // We are not using soft deletes, so this isn't relevant for now.
        // For demonstration, let's deny by default.
        return false;
    }
}