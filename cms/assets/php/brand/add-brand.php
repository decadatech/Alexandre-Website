<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

    $nome = mysqli_real_escape_string($conexao, trim($_POST['name']));

    $imagem = $_FILES['photo']['name'];
    $imagemtemp = $_FILES['photo']['tmp_name'];

    $extensao = pathinfo ( $imagem, PATHINFO_EXTENSION );    
    $extensao = strtolower ( $extensao );
    $novoNome = uniqid ( time () ) . '.' . $extensao;

    
    if(move_uploaded_file($imagemtemp, "../../../../assets/images/brands/".$novoNome)){
        $queryinsere = "INSERT INTO `tb03_brand`(`tb03_nome`,`tb03_foto`) VALUES ('".$nome."','".$novoNome."')";
    }

    $resultadoinsere = mysqli_query($conexao, $queryinsere);

?>