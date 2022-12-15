<?php

use App\Models\ContactMessage;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('inbox', function(){
    $messages = ContactMessage::where('status', '=', 0)->get();
    if($messages->count()>0){
        foreach($messages as $index=>$message){
            $this->comment("============================================================");
            $this->comment("Message from $message->name ($message->email):\n");
            $this->comment("Subject: $message->subject");
            $this->comment("Body: $message->message\n");
            $this->comment("Sent On: ".Carbon::parse($message->created_at)->format('l, d F Y - H:i'));
            $this->comment("============================================================");
            ContactMessage::where('id', '=', $message->id)->update(['status'=>1]);
            if($index==$messages->count()-1){
                continue;
            }
            $continue = $this->choice('Would you like to check other mails?', ['Y', 'N'], 0);
            if($continue=='Y'){
                continue;
            }
            break;
        }
    }
    else{
        $this->comment("No messages!!");
    }
})->purpose('Get all unread messages');

Artisan::command('read', function(){
    $messages = ContactMessage::where('status', '=', 1)->get();
    if($messages->count()>0){
        foreach($messages as $index=>$message){
            $this->comment("============================================================");
            $this->comment("Message from $message->name ($message->email):\n");
            $this->comment("Subject: $message->subject");
            $this->comment("Body: $message->message\n");
            $this->comment("Sent On: ".Carbon::parse($message->created_at)->format('l, d F Y - H:i'));
            $this->comment("============================================================");
            if($index==$messages->count()-1){
                continue;
            }
            $continue = $this->choice('Would you like to check other mails?', ['Y', 'N'], 0);
            if($continue=='Y'){
                continue;
            }
            break;
        }
    }
    else{
        $this->comment("No read messages!!");
    }
})->purpose('Get all read messages');

Artisan::command('junk', function(){
    ContactMessage::where('status', '=', 1)->delete();
    $this->comment("All read messages deleted!");
})->purpose('Delete all read messages');
