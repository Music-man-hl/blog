<?php
namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'cover', 'content', 'is_top', 'is_hidden', 'view', 'comment'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromTimeString($value)->diffForHumans();
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimeString($value)->toDateString();
    }

    /**
     * 只查询发布的文章.
     *
     * @param Builder $query
     * @return Builder
     */
    public static function scopeIsPublic(Builder $query)
    {
        return $query->where('status', 'PUBLISHED');
    }

    /**
     * 排序置顶文章.
     *
     * @param Builder $query
     * @return Builder
     */
    public static function scopeOrderByTop($query)
    {
        return $query->orderBy('featured', 'desc');
    }

    /**
     * 获得此博客文章的评论
     */
    public function comments()
    {
        return $this->hasMany('App\Comment')->where('parent_id', 0)->latest('created_at');
    }

    /**
     * 获得此博客文章的标签
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag','taggable');
    }

    /**
     * 更新评论量
     * @var [int]
     */
    static public function update_comment($id)
    {
        $article = Post::findOrFail($id);
        $article->comment = $article->comment + 1;
        $article->update([
            'comment' => $article->comment,
        ]);
    }
}
