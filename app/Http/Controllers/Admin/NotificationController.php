<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\AdminNotify;
use App\Jobs\SendEmailJob;
use App\Jobs\SendSms;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\NotifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller {
  public function index($var = null) {
    return view('admin.notifications.index');
  }

  public function sendNotifications(Request $request) {
    if ('all_users' == $request->user_type) {
      $rows = User::get();
    } else if ('active_users' == $request->user_type) {
      $rows = User::where('active', true)->get();
    } else if ('not_active_users' == $request->user_type) {
      $rows = User::where('active', false)->get();
    } else if ('blocked_users' == $request->user_type) {
      $rows = User::where('is_blocked', true)->get();
    } else if ('not_blocked_users' == $request->user_type) {
      $rows = User::where('is_blocked', false)->get();
    } else if ('admins' == $request->user_type) {
      $rows = Admin::get();
    }

    if ('notify' == $request->type) {
      if ('admins' == $request->user_type) {
        dispatch(new AdminNotify($rows, $request));
      } else {
        // dispatch(new Notify($rows, $request));
        Notification::send($rows, new NotifyUser($request));
      }
    } else if ('email' == $request->type) {
      dispatch(new SendEmailJob($rows->pluck('email'), $request));
    } else {
      dispatch(new SendSms($rows->pluck('phone')->toArray(), $request->message));
    }

    return response()->json();
  }
}
