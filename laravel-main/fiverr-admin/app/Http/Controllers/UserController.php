<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // সব user দেখানো
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10); 
        return view('admin.users.index', compact('users'));
    }

    // user suspend করা (status পরিবর্তন)
    public function suspend($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status === 'active' ? 'suspended' : 'active';
        $user->save();

        return redirect()->back()->with('success', 'User status updated successfully!');
    }

    // user delete করা
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
