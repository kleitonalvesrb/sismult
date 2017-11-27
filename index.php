<?php
require_once("vendor/autoload.php");
use \SLim\Slim;
use \Sismult\Page;
use \Sismult\PageAdmin;
use \Sismult\Modelo\Usuario;
use \Sismult\Valida\Validacao;
use \Sismult\DB\Sql;
use \Sismult\DAO\UsuarioDAO;


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

$app->post(
    '/login', function() {
     if(isset($_POST['email'])){
        if(empty($_POST['email'])){
            echo "Campo email vazio";
            return;
        }
         $email = $_POST['email'];
         $validar = new Validacao();
         if(!$validar->validaEmail($email)){
             echo "Email invalido, informe novamente";
             return;
         }

    }
    if(isset($_POST['senha'])){
        if(empty($_POST['senha'])){
            echo "Campo senha vazio";
            return;
        }
        $senha = $_POST['senha'];


    }



});




// Está função faz o diferecionamento de rota para pagina de login do administrador
$app->get('/admin/login', function(){

	$page = new PageAdmin([

		"header"=> false,
		"footer"=> false
	]);

	$page->setTpl("login");
});


/**
 * Responsavel por inserir o usuario, esse metodo
 * a priore é solicitado pela funcao js cadastrarUsuario() via ajax
 */
$app->post(
    '/admin/login', function(){
	if(isset($_POST['nome'])){
		if(empty($_POST['nome'])){
			 echo "Campo nome vazio";
			return;
		}
		$nome = $_POST['nome'];
	}
	if(isset($_POST['email'])){
		if(empty($_POST['email'])){
			echo "Campo email vazio";
			return;
		}
		$email = $_POST['email'];
		$validar = new Validacao();
		if(!$validar->validaEmail($email)){
			echo "Email invalido, informe novamente";
			return; 
		}

	}
	if(isset($_POST['senha'])){
		if(empty($_POST['senha'])){
			echo "Campo senha vazio";
			return;
		}
		$senha = $_POST['senha'];
		


	}

	if(isset($_POST['confirmaSenha'])){
		if(empty($_POST['confirmaSenha'])){
			echo "Campo confirma senha vazio";
			return;

		}
		$confirmaSenha = $_POST['confirmaSenha'];
	}
    /**
     * criacao do objeto usuario e sua populacao
     */
    $usuario = new Usuario();
	$usuario->setNome($nome);
	$usuario->setEmail($email);
	$usuario->setSenha($senha);
	$usuario->setConfirmaSenha($confirmaSenha);

    /**
     * cria uma instancia de objeto usuarioDao
     */
	$usuarioDao = new UsuarioDao();
    /**
     * result deve ser um array, pois o indice (chave) chamado nesse de [resultado] será a chave do json
     */
	$result["resultado"] = $usuarioDao->inserir($usuario); // manda inserir o usuario e espera uma variavel como resposta
        // essa pode ser 0 para nao inserido (ocorre quando ja possui um email ja cadastrado) ou 1 quando sucedido

     var_dump( json_encode($result)); // transdorma o result em json e devolve para a funçao que solicitou via ajax

});


$app->config('debug',true);

$app->get('/sobre',function(){
	
	$page = new Page([ 

		"header"=> false,
		"footer"=> false
	]);

	$page->setTpl("sobre");
});



$app->run();


?>