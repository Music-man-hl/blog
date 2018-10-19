<?php

namespace App\Console\Commands;

use App\Picture;
use App\Tag;
use App\TagOther;
use Illuminate\Console\Command;
use MusicManHl\QcloudImage\CIClient;

class PictureTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generationTags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成图片标签';

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
        $pictures = Picture::all();
        foreach ($pictures as $picture) {
            $tagResult = $this->imageRecognition($picture->url);
            $tags = json_decode($tagResult)->tags ?? [];
            foreach ($tags as $tag) {
                $tagModel = Tag::firstOrCreate(['name' => $tag->tag_name]);
                TagOther::firstOrCreate(['tag_id' => $tagModel->id, 'other_type' => 'picture', 'other_id' => $picture->id, 'confidence' => $tag->tag_confidence]);
            }
        }
        return 'success';
    }

    public function imageRecognition($fileBuffer)
    {
        $client = new CIClient(env('QCLOUD_APP_ID'), env('QCLOUD_SECRET_ID'), env('QCLOUD_SECRET_KEY'), '');
        return $client->tagDetect(['url' => config('filesystems.disks.qiniu.domains.default') . '/' . $fileBuffer]);

    }
}
