<?php 

class Usuario
{
	private $email;
	private $senha;
	private $nome;
	private $dtcadastro;

	public function __get($attr)
	{
		return $this->$attr;
	}

	public function __set($attr,$value)
	{
		$this->$attr=$value;
	}

	public function loadById($email)
	{
		$sql= new Sql();
		$result=$sql->select("select * from usuarios where email=:EMAIL",array(
			":EMAIL"=>$email
		));

		if (count($result)>0) 
		{
			$row = $result[0];
			$this->__set("email",$row['email']);
			$this->__set("senha",$row['senha']);
			$this->__set("nome",$row['nome']);
			$this->__set("dtcadastro",$row['dtcadastro']);
		}
	}

	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * from usuarios order by nome;");
	}

	public static function search($login){
		$sql = new Sql();
		 return $sql->select("select * from usuarios where nome like :NOME order by nome asc",array(
		 	":NOME"=>"%".$login."%"
		 ));
	}

	public function login($login,$passwd)
	{
		$sql= new Sql();
		$result=$sql->select("select * from usuarios where email=:EMAIL and senha=:PWD",array(
			":EMAIL"=>$login,
			":PWD"=>$passwd
		));

		if (count($result)>0) 
		{
			$row = $result[0];
			$this->__set("email",$row['email']);
			$this->__set("senha",$row['senha']);
			$this->__set("nome",$row['nome']);
			$this->__set("dtcadastro",$row['dtcadastro']);
		}else{
			echo "Não foi possivel achar $login -> $passwd";
			throw new Exception("Error Processing Request");

		}
	}

	public function __toString(){
		return json_encode(array(
			"email" =>$this->__get('email'),
			"senha" =>$this->__get('senha'),
			"nome" =>$this->__get('nome'),
			"dtcadastro" =>$this->__get('dtcadastro')
		));
	}
}
 ?>