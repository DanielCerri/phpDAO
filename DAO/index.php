<?php 

require_once("config.php");
	
	$sql= new Sql();
	$usuarios = $sql->select("select * from usuarios");
	echo "<pre>";
	print_r($usuarios);
	echo "</pre>";
 ?>