<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function uploadProfilePicture(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user(); // Get the authenticated user

        // Handle the file upload
        if ($request->hasFile('profile_picture')) {
            // Generate a unique filename
            $filename = time() . '.' . $request->file('profile_picture')->getClientOriginalExtension();

            // Store the file in the public/profile_pictures directory
            $path = $request->file('profile_picture')->storeAs('profile_pictures', $filename, 'public');

            // Update the user's profile picture in the database
            $user->profile_picture = $path;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Profile picture uploaded successfully!',
                'profile_picture_url' => Storage::url($path),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to upload profile picture.',
        ], 500);
    }

}
