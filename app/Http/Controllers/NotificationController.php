<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function showAll()
    {   
        $user = Auth::user();
        $total_notif = Notification::count();
        if (Auth::user()->role == 'admin') {
            $notifications = Notification::orderBy('updated_at', 'desc')->get();
            return view('admin.all_notif', compact('notifications', 'total_notif'));
        }else{
            $notifications = Notification::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();
            return view('user.all_notif', compact('notifications', 'total_notif'));
        }
        
    }
}
