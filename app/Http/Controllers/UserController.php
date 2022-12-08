<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // get all users
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return Helper::response_success(true, $users, 'Successfully loaded');
    }

    // get individual user by id
    public function show(User $user)
    {
        if ($user) {

            return Helper::response_success(true, $user, 'Successfully loaded');
        }

        return Helper::response_error('Not found', 404);
    }

    // delete a user
    public function destroy(User $user)
    {
        $user->delete();

        return Helper::response_success(true, $user, 'Successfully Deleted');
    }
}
