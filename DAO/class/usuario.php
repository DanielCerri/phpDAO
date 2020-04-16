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