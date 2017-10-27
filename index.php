<?php
require_once("vendor/autoload.php");
use \SLim\Slim;
use \Sismult\Page;
use \Sismult\PageAdmin;
use \Sismult\Modelo\Usuario;

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

$app->get('/admin/login', function(){

	$page = new PageAdmin([

		"header"=> false,
		"footer"=> false
	]);

	$page->setTpl("login");
});

$app->post('/admin/login', function(){

	Usuario::login($_POST["email"], $_POST["senha"]);

	header("Location: /admin");// Redirecionamento para pagina de administração 
	exit;
});

$app->run();


?>