<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

// User
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show user's public profile
     * 
     * @param array $unique_id
     */
    public function public_profile ($unique_id) {
        $profile = User::where('unique_id', $unique_id)
            ->first();

        return Inertia::render('Public/Profile', [
            'profile' => $profile
        ]);
    }

    /**
     * Update user's notification preference
     * 
     * @
     */
    public function update_notification_preference (Request $request, $id) {
        $user = User::findOrFail($id);

        $user->forceFill([
            'notification_new_task' => $request->notification_new_task,
            'notification_mention' => $request->notification_mention,
            'notification_new_project' => $request->notification_new_project,
            'notification_new_activity' => $request->notification_new_activity
        ])->save();

        return redirect()->back();
    }
}
