<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function delete(User $user)
    {
        // Optional: Check if the authenticated user has the right to delete users
        if (!Auth::user()->is_admin) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }

        try {
            $user->delete();
            return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Failed to delete user.');
        }
    }
}
?>