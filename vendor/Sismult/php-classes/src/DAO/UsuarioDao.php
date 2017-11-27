<?php
/**
 * Created by PhpStorm.
 * User: Deyvidrl
 * Date: 26/11/2017
 * Time: 15:53
 */

namespace Sismult\DAO;


class UsuarioDao extends \Sismult\DB\Sql
{

    /**
     * O método insere o usuario, o retorno indica se foi possível inserir.
     * Retorno 1 indica inserção com sucesso, retorno 0 indica que já existe algum usuario
     * cadastrado com o email informado
     * @param $usuario
     * @return int
     */
    function inserir($usuario)
    {
        $sqlInsert = "insert into tb_usuario (nomeUsuario,email,senha) values
                      (:nome,:email,:senha)"; // cria a query de inserçao, os values possuem : (dois pontos) seguido pelo
        // nome da coluna no banco
        $stmt = $this->getConn()->prepare($sqlInsert); //prepara a query para receber os valores reais que serão substituidos
        //pelos valores que vem do formulario de cadastro.

        /**
         * executa o comando de inserçao, na hora de inserir
         * ira substituir os :nome, :email, :senha pelos valores correspondentes no objeto
         *
         * utiliza o (:nome) para evitar sql injection e/ou quebrar o comando do sql com caracteres especiais.
         *
         */
        $stmt->execute(array(
            ':nome' => $usuario->getNome(),
            ':email' => $usuario->getEmail(),
            ':senha' => md5($usuario->getSenha())
        ));
        echo "aqui";
        return $stmt->rowCount();
    }

    function atualizar($idUsuario, $usuarioParaAtualizar)
    {
        // TODO: Implement atualizar() method.
    }

    function deletar($idUsuario)
    {
        // TODO: Implement deletar() method.
    }
    function consulta($idUsuario)
    {
        $sqlSelect = $this->getConn()->query("SELECT email, senha FROM tb_usuario;");
        while ($linha = $sqlSelect->fetch(PDO::FETCH_ASSOC)) {
            echo "Email: {$linha['email']} - Senha: {$linha['senha']}<br />";
        }
    }
}