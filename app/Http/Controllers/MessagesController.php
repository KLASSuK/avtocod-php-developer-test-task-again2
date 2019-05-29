<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    /**
     * Main page with all messages
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'DESC')->get();

        return view('home')->with('messages', $messages);
    }

    /**
     * Add and save message.
     *
     * @param CreateMessageRequest $request
     *
     * @return Response
     */
    public function addMessage(CreateMessageRequest $request)
    {
        $input = $request->all();

        $input['id_owner'] = Auth::guard()->user()->id;

        Message::create($input);

        return redirect()->route('index')->with('success', 'Message successfully created!');
    }

    /**
     * Delete message
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMessage($id)
    {
        $articles = Message::findOrFail($id);

        $articles->delete();

        return redirect(route('index'));
    }

    /**
     * reg_success_page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function regSuccess()
    {
        return view('auth.regSuccess');
    }
}
