<?php
require_once("vendor/autoload.php");
use \SLim\Slim;
use \Sismult\Page;
use \Sismult\PageAdmin;

$app = new \Slim\Slim();

$app->config('debug',true);

$app->get('/',function(){
	
	$page = new Page();

	$page->setTpl("index");
});


$app->config('debug',true);

$app->get('/admin',function(){
	
	$page = new PageAdmin();

	$page->setTpl("index");
});

$app->run();


?>