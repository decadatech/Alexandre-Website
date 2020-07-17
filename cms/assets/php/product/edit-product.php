<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";

    $nome =  mysqli_real_escape_string($conexao, trim($_POST["nome"]));
    $descricao =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["descricao"])));
    $id = $_POST["id"];

    $queryinsere = "UPDATE `tb04_product` SET `tb04_nome`='".$nome."', `tb04_descricao`='".$descricao."' WHERE `tb04_id` = '".$id."'";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

	
?>