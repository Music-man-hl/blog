<?php


namespace App\Http\Controllers\Admin;


use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $pageSize = 6;

    public function index(Request $request)
    {
        $articles = Post::offset(($request->page - 1) * $this->pageSize)->limit($this->pageSize)->get();
        $count = Post::count();
        return success(['count' => $count, 'list' => $articles]);
    }

    public function show(Request $request, $id)
    {
        $article = Post::findOrFail($id);
        $article->increment('view');;

//        $inputs = new CommentInputs($request);
        return success($article);
    }

    /*
     * @api
     */
    public function switchTop($id)
    {
        $article = Post::findOrFail($id);
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
        $article = Post::findOrFail($id);
        $article->is_hidden = $article->is_hidden ? 0 : 1;
        $article->save();
        if ($article->save()) {
            return success();
        }
        return success();
    }
}
