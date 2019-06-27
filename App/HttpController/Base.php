<?php


namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;

class Base extends Controller
{
    public function index()
    {

    }

    protected function write($statusCode = 200, $result = null, $msg = null)
    {
        $this->response()->withAddedHeader( 'Access-Control-Allow-Origin', '*');
        $this->response()->withAddedHeader( 'Content-Type', 'application/json; charset=utf-8' );
        $this->response()->withAddedHeader( 'Access-Control-Allow-Headers', 'X-Requested-With,Content-Type,Access-Token,User-Id,Request-Url,Source,Longitude,Latitude,Wechat-Openid,Authorization');
        $this->response()->withAddedHeader( 'Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');

        $this->writeJson($statusCode, $result, $msg);
    }

    protected function onException(\Throwable $throwable): void
    {
        $this->write(400, '', $throwable->getMessage());
    }

}