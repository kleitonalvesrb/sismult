<?php 

namespace DB;


class Sql {

	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "sismult";

	private $conn;
	
	public function Sql()
	{
		echo "oi";

		$this->conn = new \PDO("mysql:host=HOST;dbname=sismult","root","");
	

		if($this->conn){
			echo "Conexão";

		}else{
			echo "Erro ao conecta";
		}

	}

	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

}

 ?>