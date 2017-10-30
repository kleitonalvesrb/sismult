<?php
require_once("vendor/autoload.php");
use \SLim\Slim;
use \Sismult\Page;
use \Sismult\PageAdmin;
use \Sismult\Modelo\Usuario;

$app = new \Slim\Slim();



// Está função faz o direcionamento de rota para pagina inicial do site
$app->config('debug',true);

$app->get('/',function(){
	
	$page = new Page();

	$page->setTpl("index");
});


// Está função faz o diferecionamento de rota para pagina inicial do administrador 
$app->config('debug',true);

$app->get('/admin',function(){
	
	$page = new PageAdmin();

	$page->setTpl("index");
});



// Está função faz o diferecionamento de rota para pagina de login 
$app->config('debug',true);

$app->get('/login',function(){
	
	$page = new Page([ 

		"header"=> false,
		"footer"=> false
	]);

	$page->setTpl("login");
});



// Está função faz o diferecionamento de rota para pagina de login do administrador
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

// essa funcao e para fazer a chamada da tela registra
$app->config('debug',true);

$app->get('/registra',function(){
	
	$page = new page();

	$page->setTpl("index");
});

$app->run();


?>