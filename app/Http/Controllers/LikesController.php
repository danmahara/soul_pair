<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function likeUser($likedUserId)
    {
        $currentUserId = auth()->id(); // Get the currently authenticated user's ID

        // Check if the current user has already liked the other user
        $existingLike = Like::where('user_id', $currentUserId)
                            ->where('liked_user_id', $likedUserId)
                            ->first();

        if (!$existingLike) {
            // Create a new like
            Like::create([
                'user_id' => $currentUserId,
                'liked_user_id' => $likedUserId,
            ]);

            // Check if the liked user has also liked the current user
            $mutualLike = Like::where('user_id', $likedUserId)
                              ->where('liked_user_id', $currentUserId)
                              ->first();

            if ($mutualLike) {
                // If a mutual like is found, create a match
                Match::create([
                    'user_id' => $currentUserId,
                    'matched_user_id' => $likedUserId,
                ]);
                Match::create([
                    'user_id' => $likedUserId,
                    'matched_user_id' => $currentUserId,
                ]);

                // Return a response indicating a match has been created
                return response()->json(['message' => 'It\'s a match!']);
            }
        }

        return response()->json(['message' => 'User liked successfully.']);
    }
}
