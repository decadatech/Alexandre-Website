<?php
    include_once "conexao.php";

    $query = "SELECT * FROM `tb02_warning` WHERE 1 LIMIT 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){    
            $mensagem = $linha['tb02_mensagem'];
        }
    }
    
    echo $mensagem;

?>