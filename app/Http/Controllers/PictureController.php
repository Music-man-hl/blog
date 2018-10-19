<?php
/**
 * Created by PhpStorm.
 * User: yanghaoliang
 * Date: 2018/10/14
 * Time: 1:08 AM
 */

namespace App\Http\Controllers;


use App\Common\AiQQ;
use App\Picture;
use App\Tag;
use Illuminate\Http\Request;
use MusicManHl\QcloudImage\CIClient;
use Storage;

class PictureController extends Controller
{
    protected $domain;

    public function __construct()
    {
        $this->domain = config('filesystems.disks.qiniu.domains.default');
    }

    public function index()
    {
        $pictures = Picture::whereCategory(1)->with('tags')->get();

        return success([
            'prefix' => $this->domain,
            'files' => $pictures
        ]);
    }

    public function store(Request $request)
    {
        try {
            $fileContent = getBase64Image($request->file);
            $fullName = $this->generationImageName('/', $request->file);
            $isStorage = Storage::disk('qiniu')->put($fullName, base64_decode($fileContent));
            if (!$isStorage) {
                return error();
            }

            $data = [
                'user_id' => $request->user()->id,
                'title' => $request->name,
                'url' => $fullName,
                'category' => $request->get('type', 1)
            ];
            $picture = Picture::create($data);
            $result = $this->imageRecognition($fullName, $fileContent);
            $tags = json_decode($result['tags'])->tags;
            $info = $result['info'];

            Tag::savePictureTag($tags, $picture->id);

        } catch (\Exception $e) {
            return error($e->getMessage());
        }
        return success(compact('picture', 'tags', 'info'));
    }

    public function update(Request $request, $id)
    {
        $picture = Picture::findOrFail($id);
        $picture->title = $request->title;
        if (!$picture->save()) {
            return error();
        }
        return success();
    }

    public function destroy($id)
    {
        try {
            $picture = Picture::findOrFail($id);
            $picture->delete();
            $result = \Storage::disk('qiniu')->delete($picture->url);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return error($e->getMessage());
        }
        if (!$result) {
            return error('图片不存在');
        }
        return success();

    }

    public function generationImageName($path, $file)
    {
        $filePath = $path;
        $fileName = uniqueString();
        preg_match('/.*\/(\w+);/', $file, $matches);
        $fileSuffix = '.' . $matches[1];
        return $filePath . $fileName . $fileSuffix;
    }


    public function imageRecognition($fileName, $base64)
    {
        $fileUrl = $this->domain . '/' . $fileName;
        $client = new CIClient(env('QCLOUD_APP_ID'), env('QCLOUD_SECRET_ID'), env('QCLOUD_SECRET_KEY'), '');
        $aiQQ = new AiQQ(env('AIQQ_APP_ID'), env('AIQQ_APP_KEY'));

        return [
            'info' => $aiQQ->faceRecognition($base64),
            'tags' => $client->tagDetect(['url' => $fileUrl])
        ];
    }

}


