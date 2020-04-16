<?php 

require_once("config.php");
	
	/*
	$sql= new Sql();
	$usuarios = $sql->select("select * from usuarios");
	echo "<pre>";
	print_r($usuarios);
	echo "</pre>";
	*/

/*
// Carrega pelo Email (apenas 1 registro) 
	$users = new Usuario();
	$users->loadById("daniel.cerri@hotmail.com");
	echo $users;
*/

//Carregando Lista de Usuarios 

	/*
	echo "<pre>";
	$lista= Usuario::getList();
	echo  json_encode($lista);
	echo "</pre>";

	echo "<br>";

	$lista=Usuario::search("dan");
	echo  json_encode($lista);

*/

	$login = new Usuario();
    $login->login("daniel.cerri@hotmail.com","1234");
	echo $login;
 ?>