<script>
    feather.replace()
</script>
<?php
    include_once "conexao.php";

    $query = "SELECT * FROM `tb06_about` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){    
        echo'<h3><i data-feather="'.$linha['tb06_icone'].'"></i> '.$linha['tb06_titulo'].'</h3>
             <h5>'.$linha['tb06_descricao'].'</h5>';
        }
    }
    
?>