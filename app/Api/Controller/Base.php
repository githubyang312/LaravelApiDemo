<?php
/**
 * Created by yangyu.
 * Date: 2018/4/27
 * Time: 18:09
 */

namespace App\Api\Controller;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Base extends Controller
{

    private $successCode = 100;
    private $errCode = 0;
    protected $postParams;

    public function __construct()
    {
        //$this->getPostParams();
    }

    /**
     * 获取请求传递的参数
     * @param Request $request
     */
    protected function getPostParams(Request $request)
    {
        //$this->postParams = $request->all();
    }

    /**
     * 成功  返回数据
     * {"code":100,"msg":"获取成功","data":{[1,2,4]}
     */
    protected function okData($data, $msg)
    {
        $jsonData = response()->json(
            [
                'code' => $this->successCode,
                'msg' => $msg,
                'data' => $data
            ]
        );
        return $jsonData;
    }

    /**
     * 成功  返回list数据
     * {"code":100,"msg":"获取成功","data":{"list":[1,2,4]}}
     */
    protected function listData($data, $msg)
    {
        $jsonData = response()->json(
            [
                'code' => $this->successCode,
                'msg' => $msg,
                'data' => ['list' => $data]
            ]
        );
        return $jsonData;

    }

    /**
     * 失败  返回数据
    {"code":0,"msg":"获取成功","data":null}
     */
    protected function errData($msg)
    {
        $jsonData = Response()->json([
            'code' => $this->errCode,
            'msg' => $msg,
            'data' => null
        ]);
        return $jsonData;
    }


}