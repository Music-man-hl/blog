<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


/**
 * App\Visit
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $ip
 * @property string|null $path
 * @property string|null $page
 * @property string|null $title
 * @property string|null $city
 * @property int $user_id
 * @property string|null $client
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereUserId($value)
 */
class Visit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page', 'ip', 'city'
    ];

    /**
     * 记录访问数据
     *
     * @param Request $request
     * @param string $page
     * @param string $title
     */
    public static function record(Request $request, $page = '', $title = '')
    {
        $city = get_city($request->ip());
        $visit = new Visit;
        if ($request->user()) {
            $visit->user_id = $request->user()->id;
        }
        $visit->path = $request->path();
        $visit->page = $page;
        $visit->title = $title;
        $visit->ip = $request->ip();
        $visit->city = $city['region'] . ' ' . $city['city'];
        $visit->client = $request->userAgent();
        $visit->save();
    }
}
