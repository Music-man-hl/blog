<?php
/*
 * 辅助函数文件
 */

/*
 * 返回成功
 */
if (!function_exists('success')) {

    /**
     * @param array|\Illuminate\Database\Eloquent\Collection $data
     * @param string $msg
     * @return array|bool|mixed
     */
    function success($data = [], $msg = '成功')
    {
        return response(['code' => 0, 'msg' => $msg, 'count' => 0, 'data' => $data]);
    }
}

/*
 * 返回失败
 */
if (!function_exists('error')) {

    /**
     * @param $msg
     * @param array|\Illuminate\Database\Eloquent\Collection $data
     * @return array|bool|mixed
     */
    function error($msg = '错误', $data = [])
    {
        return response(['code' => 50000, 'msg' => $msg, 'data' => $data], 500);
    }
}

if (!function_exists('get_city')) {

    /**
     * @param string $ip
     * @return array|bool|mixed
     */
    function get_city($ip = '')
    {
        if ($ip == '') {
            $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
            return $ip = json_decode(file_get_contents($url), true);
        } else {
            $url = "http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip;
            $ip = json_decode(file_get_contents($url));
            if ($ip->code == 0) {
                return (array)$ip->data;
            }
        }

        return false;
    }
}