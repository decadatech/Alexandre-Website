<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

    $nome = mysqli_real_escape_string($conexao, trim($_POST['name']));
    $descricao = mysqli_real_escape_string($conexao, trim(nl2br($_POST['description'])));    

    $imagem = $_FILES['photo']['name'];
    $imagemtemp = $_FILES['photo']['tmp_name'];

    $extensao = pathinfo ( $imagem, PATHINFO_EXTENSION );    
    $extensao = strtolower ( $extensao );
    $novoNome = uniqid ( time () ) . '.' . $extensao;

    
    if(move_uploaded_file($imagemtemp, "../../../../assets/images/products/".$novoNome)){
        $queryinsere = "INSERT INTO `tb04_product`(`tb04_nome`,`tb04_descricao`,`tb04_foto`) VALUES ('".$nome."','".$descricao."','".$novoNome."')";
    }
    
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

?>