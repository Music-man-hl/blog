<?php
/**
 *
 * User: yanghaoliang
 * Date: 2019-05-12
 * Email: <haoliang.yang@gmail.com>
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * 获得此标签下的文章
     */
    public function articles()
    {
        return $this->belongsToMany('App\Post', 'other');
    }

    public function pictures()
    {
        return $this->morphedByMany('App\Picture', 'other');
    }

    public static function savePictureTag($tags, $picture_id)
    {
        foreach ($tags as $tag) {
            $tagModel = self::firstOrCreate(['name' => $tag->tag_name]);
            TagOther::firstOrCreate(['tag_id' => $tagModel->id, 'other_type' => 'picture', 'other_id' => $picture_id, 'confidence' => $tag->tag_confidence]);
        }
    }
}