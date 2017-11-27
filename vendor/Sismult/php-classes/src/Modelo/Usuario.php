<?php

namespace Sismult\Modelo;
use \Sismult\DB\Sql;


class Usuario{



	private $idUsuario;
	private $nome;
	private $email;
	private $senha;
	private $confirmaSenha;
	private $dataCadastro;
	private $isAdmin;

	public function setIdUsuario($idUsuario) {
			$this->idUsuario = $idUsuario;
	}

	public function getIdUsuario() {
		return $this->idUsuario;
	}

	public function setNome($nome) {
			$this->nome = $nome;
	}

	public function getNome() {
		return $this->nome;
	}


	public function setEmail($email) {
			$this->email = $email;
	}

	public function getEmail() {
		return $this->email;
	}


	public function setSenha($senha) {
			$this->senha = $senha;
	}

	public function getSenha() {
		return $this->senha;
	}



    public function setConfirmaSenha($confirmaSenha) {
        $this->confirmaSenha = $confirmaSenha;
    }

    public function getConfirmaSenha() {
        return $this->confirmaSenha;
    }


	public function getDataCadastro() {
		return $this->dataCadastro;
	}

	public function setDataCadastro($dataCadastro) {
		$this->dataCadastro = $dataCadastro;
	}


    public function getisAdmin()
    {
        return $this->isAdmin;
    }


    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }






	


}

?>