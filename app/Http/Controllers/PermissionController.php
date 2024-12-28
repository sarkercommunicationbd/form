<?php

namespace App\Http\Controllers;

use App\Models\UserPermission;
use Illuminate\Http\Request;
use App\Models\User;

class PermissionController extends Controller
{

    //newcodes for permission

    public function userPermission($userId)
    {
        // Fetch the user's permissions
        $userPermissions = UserPermission::where('user_id', $userId)->pluck('permission_id')->toArray();

        // Define all possible permissions
        $permissionsList = [
            10 => 'Dashboard Option',
            1 => 'All Request Option',
            2 => 'Approved Option',
            3 => 'Decline Option',
            7 => 'Permission Settings',
            11 => 'Sub Admin Option',
            12 => 'Change Password',
            4 => 'View Button',
            5 => 'Edit Button',
            6 => 'Delete Button',
            8 => 'Approve Button',
            9 => 'Decline Button',
        ];

        $users = User::all(); // List of all users for selection

        return view('backend.user-permission', compact('permissionsList', 'userPermissions', 'users', 'userId'));
    }

    public function updateUserPermission(Request $request, $userId)
    {
        // Validate the input
        $request->validate([
            'permission' => 'array',
        ]);

        // Get submitted permissions
        $submittedPermissions = $request->input('permission', []);

        // Remove existing permissions for the user
        UserPermission::where('user_id', $userId)->delete();

        // Insert updated permissions
        $permissionsToInsert = [];
        foreach ($submittedPermissions as $permissionId) {
            $permissionsToInsert[] = [
                'user_id' => $userId,
                'permission_id' => $permissionId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if (!empty($permissionsToInsert)) {
            UserPermission::insert($permissionsToInsert);
        }

        return redirect()->back()->with('status', 'User permissions updated successfully!');
    }





}
