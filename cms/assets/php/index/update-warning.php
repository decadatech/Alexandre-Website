<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

	$mensagem =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["message"])));

    $queryinsere = "UPDATE `tb02_warning` SET `tb02_mensagem` = '".$mensagem."' WHERE 1";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    // if($resultadoinsere){
    //     header ("Location: ../../testes/form_plans.html");
    // }else{
    //     echo "Erro: ". mysqli_error($conexao);
    // }
	
?>