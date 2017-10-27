<?php

namespace Sismult\Modelo;
use \Sismult\DB\Sql;


class Usuario{

	public static function login($email, $senha)
	{
		$sql = new Sql();

		$results = $sql->select ("SELECT *FROM tb_usuario WHERE deslogin = :LOGIN", array(":LOGIN"=>$login));
	}
}

?>