<?php
/**
 * Created by PhpStorm.
 * User: yanghaoliang
 * Date: 2018/10/17
 * Time: 3:46 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class TagOther extends Model
{
    protected $table = 'tag_other';
    protected $fillable = ['tag_id', 'other_id', 'other_type', 'confidence'];

}