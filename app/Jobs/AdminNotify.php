<?php

namespace App\Jobs;

use App\Notifications\NotifyAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class AdminNotify implements ShouldQueue {
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  protected $admins, $data;

  public function __construct($admins, $request) {
    $this->data = [
      'sender'       => auth('admin')->id(),
      'sender_model' => 'Admin',
      'title'        => $request['title'],
      'body'         => $request['body'],
      'type'         => 'admin_notify',
    ];
    $this->admins = $admins;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    Notification::send($this->admins, new NotifyAdmin($this->data));
  }
}
