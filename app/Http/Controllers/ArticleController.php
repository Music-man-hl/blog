<?php

namespace App\Http\Controllers;

use App\Article;
use App\CommentInputs;
use App\Visit;
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
        return success(['count' => $count, 'list' => $articles]);
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

//        $inputs = new CommentInputs($request);

        return view('article.show',compact('article'));
    }

    /*
     * @api
     */
    public function switchTop($id)
    {
        $article = Article::findOrFail($id);
        $article->is_top = $article->is_top ? 0 : 1;
        if (!$article->save()) {
            return success();
        }
        return success();
    }

    /*
     * @api
     */
    public function switchHidden($id)
    {
        $article = Article::findOrFail($id);
        $article->is_hidden = $article->is_hidden ? 0 : 1;
        $article->save();
        if ($article->save()) {
            return success();
        }
        return success();
    }

}


