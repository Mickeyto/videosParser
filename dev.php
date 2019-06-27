<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2019-01-01
 * Time: 20:06
 */

return [
    'SERVER_NAME' => "EasySwoole",
    'MAIN_SERVER' => [
        'LISTEN_ADDRESS' => '0.0.0.0',
        'PORT' => 9810,
        'SERVER_TYPE' => EASYSWOOLE_WEB_SERVER, //可选为 EASYSWOOLE_SERVER  EASYSWOOLE_WEB_SERVER EASYSWOOLE_WEB_SOCKET_SERVER,EASYSWOOLE_REDIS_SERVER
        'SOCK_TYPE' => SWOOLE_TCP,
        'RUN_MODEL' => SWOOLE_PROCESS,
        'SETTING' => [
            'worker_num' => 8,
            'task_worker_num' => 8,
            'reload_async' => true,
            'task_enable_coroutine' => true,
            'max_wait_time'=>3
        ],
    ],
    'TEMP_DIR' => null,
    'LOG_DIR' => null,
    'PHAR' => [
        'EXCLUDE' => ['.idea', 'Log', 'Temp', 'easyswoole', 'easyswoole.install']
    ],
    'custom_header' => [
        'weibo_cookie' => 'SUBP=0033WrSXqPxfM725Ws9jqgMF55529P9D9WW3PsCb55p3CXxHR9oDv0OW5JpX5KzhUgL.FozN1KefehzXS052dJLoIEXLxKBLB.BLBK5LxKnL1hBLBo2LxKnLBoBLB-zLxKBLB.2L1hqLxK-L1K5L1KMt;  SUB=_2A25xqLwdDeRhGeRJ4lEU8CzIzDyIHXVS36rVrDV8PUNbn9BeLWTXkW9NUklEG2ghQmTSYlBq7Ojj_RI2o5TCBO6W;'
    ]
];
