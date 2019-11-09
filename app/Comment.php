<?php
/**
 *
 * User: yanghaoliang
 * Date: 2019-05-12
 * Email: <haoliang.yang@gmail.com>
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'article_id', 'parent_id', 'content', 'name', 'email', 'website', 'avatar', 'ip', 'city'
    ];

    /**
     * 获得此评论所属的文章。
     */
    public function article()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * 获得此评论所有的回复
     */
    public function reply()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
}