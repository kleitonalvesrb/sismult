<?php 

namespace Sismult\DB;


abstract class Sql {
	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "sismult";

	private $conn;
	
	public function __construct ()
	{
	
		try {
		  	$this->conn = new \PDO("mysql:host=HOSTNAME;dbname=DBNAME","USERNAME", "PASSWORD");
		} catch(PDOException $e) {
		    echo 'ERROR: ' . $e->getMessage();
		}finally{

		}
	}

    /**
     * @return \PDO
     */
    public function getConn(): \PDO
    {
        return $this->conn;
    }



    /**
     * objeto  que sera inserido, pode ser pessoa, carro etc.
     * @param $obj
     * @return mixed
     */
	abstract function inserir($obj);

    /**
     * Id do objeto que será atualizado, e o novo objeto com os valores que serao atualizados
     * @param $id
     * @param $objNovo
     * @return mixed
     */
	abstract function atualizar($id, $objNovo);

    /**
     * id do objeto que sera excluido
     * @param $id
     * @return mixed
     */
	abstract function deletar($id);




	

}

 ?>