<?php
    include_once "conexao.php";

    $query = "SELECT * FROM `tb04_product` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){    
        echo'<div class="item">
                <img src="assets/images/products/'.$linha['tb04_foto'].'" alt="'.$linha['tb04_nome'].'e">
                <div class="item-info">
                    <h3>'.$linha['tb04_nome'].'</h3>               
                </div>
            </div>';
        }
    }
    
?>