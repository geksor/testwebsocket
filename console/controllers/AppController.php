<?php

namespace console\controllers;

use console\servers\AppServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\Server\IoServer;
use yii\console\Controller;

class AppController extends Controller
{

    public $io_port = 6380;

    /**
     * Start a Web Soket server
     * @return null
     */
    function actionStart() {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new AppServer()
                )
            ),
            $this->io_port
        );
        $server->run();
    }
}