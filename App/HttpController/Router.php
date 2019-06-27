<?php


namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\AbstractRouter;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use FastRoute\RouteCollector;

class Router extends AbstractRouter
{
    public function initialize(RouteCollector $routeCollector)
    {
        $routeCollector->get('/parser', '/parser');

        // TODO: Implement initialize() method.
        $this->setMethodNotAllowCallBack(function (Request $request,Response $response){
            $response->withStatus(404);
            $response->write('404');
            return false;//结束此次响应
        });
        $this->setRouterNotFoundCallBack(function (Request $request,Response $response){
            $response->withStatus(404);
            $response->write('404');
            return false;//重定向到index路由
        });


    }
}