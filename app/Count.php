<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Count
 *
 * @property int $id
 * @property string $key
 * @property string|null $name
 * @property string|null $intro
 * @property int $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereValue($value)
 * @mixin \Eloquent
 */
class Count extends Model
{
    //
}
