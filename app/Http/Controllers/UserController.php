<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $current_user = Auth::user();
        $user_order = $current_user->orders()->latest()->get();    

        // dd($user_order);   
        return view('user.profile', [
            'user_order' => $user_order,
            'user' => $current_user
        ]);
    }
}
