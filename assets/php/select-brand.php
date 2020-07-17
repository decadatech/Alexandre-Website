<?php
    include_once "conexao.php";

    $query = "SELECT * FROM `tb03_brand` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){    
        echo'<div class="item">
                <img src="assets/images/brands/'.$linha['tb03_foto'].'" alt="MARCA">                
            </div>';
        }
    }
    
?>