<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

	$nome =  mysqli_real_escape_string($conexao, trim($_POST["nome"]));
    $id = $_POST["id"];

    $queryinsere = "UPDATE `tb03_brand` SET `tb03_nome`='".$nome."' WHERE `tb03_id` = '".$id."'";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

	
?>