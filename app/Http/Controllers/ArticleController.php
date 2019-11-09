<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * @param Request $request
     * @param $id
     * @return Post
     */
    public function show(Request $request, $id)
    {
        $article = Post::findOrFail($id);
        return view('article.show',compact('article'));
    }

}


