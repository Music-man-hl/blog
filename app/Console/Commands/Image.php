<?php

namespace App\Console\Commands;

use App\Article;
use Illuminate\Console\Command;
use Qiniu\Auth;
use Qiniu\Config;
use Storage;

class Image extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '....';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->move();
    }

    public function move()
    {
        $accessKey = getenv('QINIU_ACCESS_KEY');
        $secretKey = getenv('QINIU_SECRET_KEY');
        $auth = new Auth($accessKey, $secretKey);
        $config = new Config();
        $srcBucket = 'yo-bucket';
        $destBucket = 'picture';
        $bucketManager = new \Qiniu\Storage\BucketManager($auth, $config);
        $files = Storage::disk('qiniu')->files('/');
        foreach ($files as $file) {
            $bucketManager->move($srcBucket, $file, $destBucket, $file);
        }
    }

    public function imageUrl()
    {
        $files = Storage::disk('qiniu')->files('/');
        $count = Article::count();
        $i = 0;
        while ($i++ < count($files)) {
            Article::whereIn('id', range($i, $count, count($files)))->update(['cover' => '/'. $files[$i - 1]]);
        }
    }
}
