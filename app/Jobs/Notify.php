<?php

namespace App\Jobs;

use App\Notifications\NotifyUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class Notify implements ShouldQueue {
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected $users, $request;

  public function __construct($users, $request) {
    $this->users   = $users;
    $this->request = $request->all();
  }

  public function handle() {
    Notification::send($this->users, new NotifyUser($this->request));
  }
}
