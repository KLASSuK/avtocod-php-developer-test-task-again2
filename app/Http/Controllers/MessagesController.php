<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests\CreateArticleRequest;

class MessagesController extends Controller
{
    /**
     * Main page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'DESC')->get();

        return view('home')->with('messages', $messages);
    }
}
