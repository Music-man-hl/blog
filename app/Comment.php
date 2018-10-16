<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property int $id
 * @property int $article_id
 * @property int $parent_id
 * @property string $content
 * @property string|null $name
 * @property string|null $email
 * @property string|null $website
 * @property string|null $avatar
 * @property string|null $ip
 * @property string|null $city
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $user_id
 * @property string|null $target_name
 * @property-read \App\Article $article
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $reply
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereTargetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereWebsite($value)
 * @mixin \Eloquent
 * @property string $contents
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContents($value)
 */
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
        return $this->belongsTo('App\Article');
    }

    /**
     * 获得此评论所有的回复
     */
    public function reply()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
}
