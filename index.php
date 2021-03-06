<?php

session_start();

require_once "vendor/autoload.php";

use \Slim\Slim;

$app = new Slim();
$app->config('debug', true);

require_once("env.php");
require_once("site.php");
require_once("site-pagseguro.php");

$app->run();
