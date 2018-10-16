<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('test', function () {
    $time1 = explode(' ', microtime());
    $data = \App\Article::where('is_hidden', '=', 1)->whereHas('comments',function ($query){
        $query->where('article_id',1);
    })->exists();
    dump( $data );
    $time2 = explode(' ', microtime());
    dump($time2[1] - $time1[1] + $time2[0] - $time1[0]);
});
