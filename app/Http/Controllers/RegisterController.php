<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
class RegisterController extends Controller
{
    public function addRegistry(Event $event, User $user){
        $user->events()->attach($event);
        return redirect()->route('events.index');
    }

    public function removeRegistry(Event $event, User $user){
        $user->events()->detach($event);
        return redirect()->route('events.index');
    }
}
