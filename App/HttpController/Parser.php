<?php


namespace App\HttpController;


use EasySwoole\EasySwoole\Config;
use Mickeyto\SVideo\SVideo;

class Parser extends Base
{
    /**
     * @return bool
     * @throws \Mickeyto\SVideo\Exception\ParserException
     */
    public function index()
    {
        $parserUri = $this->request()->getQueryParam('uri');
        if(empty($parserUri)){
            return $this->error();
        }

        $svideo = new SVideo();
        $parser = $svideo->parser($parserUri);
        if($parser->_domain == 'Weibo'){
            $parser->setHeader('Cookie', Config::getInstance()->getConf('custom_header.weibo_cookie'));
        }
        $parser->fetch();

        $playlist = $parser->playlist();

        return $this->writeJson(200, $playlist);
    }

    private function error($status=400, $msg='')
    {
        return $this->writeJson($status, $result='', $msg);
    }


}