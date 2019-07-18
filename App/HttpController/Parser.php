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
            $parser->requestUrl = $parserUri . '&blog_mid=' . $this->request()->getQueryParam('blog_mid');;
            $parser->setHeader('Cookie', Config::getInstance()->getConf('custom_header.weibo_cookie'));
        }
        $parser->fetch();
        $playlist = $parser->playlist();
        $playlist = $this->filterPlaylist($parser->_domain, 'mp4', $playlist);

        return $this->writeJson(200, $playlist);
    }

    private function pornhub(string $format, array $data)
    {
        $playlist = [
            'title'  => $data['title'],
            'playlist' => [],
        ];
        foreach($data['playlist'] as $row){
            if($row['format'] == $format){
                $playlist['playlist'][] = $row;
            }
        }

        return $playlist;
    }

    private function filterPlaylist(string $domain, string $format, array $data):array
    {
        $playlist = [];
        switch ($domain){
            case 'Pornhub':
                $playlist = $this->pornhub($format, $data);
                break;
            default:
                $playlist = &$data;
                break;
        }

        return $playlist;
    }

    private function error($status=400, $msg='')
    {
        return $this->writeJson($status, $result='', $msg);
    }


}