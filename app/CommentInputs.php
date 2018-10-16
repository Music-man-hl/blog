<?php

namespace App;


use Auth;
use Illuminate\Http\Request;

class CommentInputs
{
    public $name = '';
    public $email = '';
    public $website = '';

    public function __construct(Request $request)
    {
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
            $this->website = Auth::user()->website;
        } else {
            $comment = Comment::where('ip', $request->ip())->latest()->first();
            if ($comment) {
                $this->name = $comment->name;
                $this->email = $comment->email;
                $this->website = $comment->website;
            }
        }
    }
}