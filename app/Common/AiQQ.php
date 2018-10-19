<?php
/**
 * Created by PhpStorm.
 * User: yanghaoliang
 * Date: 2018/10/18
 * Time: 9:28 PM
 */

namespace App\Common;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AiQQ
{
    private $appId;
    private $appKey;
    private $url = 'https://api.ai.qq.com/fcgi-bin/face/face_detectface';

    public function __construct($appId, $appKey)
    {
        $this->appId = $appId;
        $this->appKey = $appKey;
    }

    public function faceRecognition($base64)
    {
        $params = array(
            'app_id' => $this->appId,
            'image' => $base64,
            'mode' => '0',
            'time_stamp' => strval(time()),
            'nonce_str' => strval(rand()),
            'sign' => '',
        );
        $params['sign'] = $this->getReqSign($params, $this->appKey);


        $response = $this->curl($this->url, $params);
        return json_decode($response);
    }

    private function getReqSign($params, $appkey)
    {
        ksort($params);

        $str = '';
        foreach ($params as $key => $value) {
            if ($value !== '') {
                $str .= $key . '=' . urlencode($value) . '&';
            }
        }

        $str .= 'app_key=' . $appkey;
        $sign = strtoupper(md5($str));
        return $sign;
    }

    private function curl($url, $params)
    {
        $client = new Client();
        try {
            $response = $client->request('POST', $url, [
                'form_params' => $params
            ]);
            return (string)$response->getBody();
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
    }

}