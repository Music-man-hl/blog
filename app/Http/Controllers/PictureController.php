<?php
/**
 * Created by PhpStorm.
 * User: yanghaoliang
 * Date: 2018/10/14
 * Time: 1:08 AM
 */

namespace App\Http\Controllers;


use App\Picture;
use Illuminate\Http\Request;
use MusicManHl\QcloudImage\CIClient;
use Storage;

class PictureController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $pictures = Picture::whereCategory(1)->get();

        return success([
            'prefix' => config('filesystems.disks.qiniu.domains.default'),
            'files' => $pictures
        ]);
    }

    public function store(Request $request)
    {
        try {
            $file = substr($request->file, strpos($request->file, ',') + 1);
            $result = Storage::disk('qiniu')->put('/' . $request->name, base64_decode($file));
            if (!$result) {
                return error();
            }

            $data = [
                'user_id' => $request->user()->id,
                'title' => $request->name,
                'url' => $request->name,
                'category' => $request->get('type', 1)
            ];
            Picture::create($data);

            $tag = $this->imageRecognition($file);
        } catch (\Exception $e) {
            return error($e->getMessage());
        }

        return success(json_decode($tag));
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

    public function imageRecognition($fileBuffer)
    {
        $client = new CIClient(env('QCLOUD_APP_ID'), env('QCLOUD_SECRET_ID'), env('QCLOUD_SECRET_KEY'), '');
        return $client->tagDetect(['base64' => $fileBuffer]);
    }

}


