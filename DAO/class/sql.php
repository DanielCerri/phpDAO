<?php 
	class Sql extends PDO
	{
		private $conn;

		public function __construct(){
			$this->conn = new PDO("mysql:host=yourhost;dbname=yourdbname","youruser","yourpwd");
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		//Metodo Query Pode ser usado para todas operações 
		//Select,Insert,Delete.......
		public function query($rawQuery,$params = array()){
			$stmt = $this->conn->prepare($rawQuery);
			$this->setParams($stmt,$params);
			$stmt->execute();
			return $stmt;	
		}

		
			public function nonQuery($rawQuery,$params = array()){
			try 
			{
				$stmt = $this->conn->prepare($rawQuery);
				$this->setParams($stmt,$params);
		 		$stmt->execute();
			} catch (PDOException $e) {
				throw new Exception("Error Processing Request" . $e->getMessage(), 1);
			}
		}	

		private function setParams($statement,$parameters=array())
		{
			foreach ($parameters as $key => $value) 
			{
				$this->setParam($statement,$key,$value);	
			}
		}

		private function setParam($statement,$key,$value){
			$statement->bindParam($key,$value);
		}


		public function select ($rawQuery,$paramns=array()):array
		{
			try {
			$stmt=$this->query($rawQuery,$paramns);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);	
			} catch (PDOException $e) {
				throw new Exception("Error Processing Request" . $e->getMessage(), 1);
			}
		}
	}
?>
