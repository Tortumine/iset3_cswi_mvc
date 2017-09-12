<?php
/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 15-08-17
 * Time: 20:01
 */

session_start();
require 'Controllers/router.php';
$router = new Router();
$router->Routing_Request();