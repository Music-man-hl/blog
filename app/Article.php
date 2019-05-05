<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string|null $cover
 * @property string|null $content
 * @property int $is_top
 * @property int $is_hidden
 * @property int $view
 * @property int $comment
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereView($value)
 */
class Article extends Model
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
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeIsPublic($query)
    {
        return $query->where('is_hidden', 0);
    }

    /**
     * 排序置顶文章.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeOrderByTop($query)
    {
        return $query->orderBy('is_top','desc');
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
        return $this->belongsToMany('App\Tag');
    }

    /**
     * 更新评论量
     * @var [int]
     */
    static public function update_comment($id)
    {
        $article = Article::findOrFail($id);
        $article->comment = $article->comment + 1;
        $article->update([
            'comment' => $article->comment,
        ]);
    }
}
