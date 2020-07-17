<?php

	include_once "conexao.php";
	date_default_timezone_set('America/Sao_Paulo');

	$nome =  mysqli_real_escape_string($conexao, trim($_POST["name"]));
	$telefone = mysqli_real_escape_string($conexao, trim($_POST["phone"]));
	$email =  mysqli_real_escape_string($conexao, trim($_POST["email"]));
	$mensagem =  mysqli_real_escape_string($conexao, trim($_POST["message"]));

	$queryinsere = "INSERT INTO `tb05_contact`(`tb05_nome`, `tb05_telefone`, `tb05_email`, `tb05_mensagem`, `tb05_data`) VALUES ('".$nome."','".$telefone."','".$email."','".$mensagem."', NOW())";
	$resultadoinsere = mysqli_query($conexao, $queryinsere);
	
?>