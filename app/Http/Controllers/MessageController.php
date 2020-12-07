<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class MessageController extends Controller
{

    public function conversation($userId) {
        $users = User::where('id', '!=', Auth::id())->get();

        $friendInfo = User::findOrFail($userId);

        $myInfo = User::find(Auth::user()->id);

        $this->data['users'] = $users;
        $this->data['friendInfo'] = $friendInfo;
        $this->data['myInfo'] = $myInfo;
        $this->data['userId'] = $userId;


        return view('message.conversation', $this->data);

    }



}
