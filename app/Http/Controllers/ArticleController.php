<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $pageSize = 6;

    /*
     * @api
     * 所有文章
     */
    public function index(Request $request)
    {
        $articles = Article::offset(($request->page - 1) * $this->pageSize)->limit($this->pageSize)->get();
        $count = Article::count();
    }

    /**
     * @param Request $request
     * @param $id
     * @return Article
     */
    public function show(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->increment('view');;
        return view('article.show',compact('article'));
    }

}


