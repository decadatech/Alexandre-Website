<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
    
    $query = "SELECT * FROM `tb03_brand` WHERE tb03_id=$codigo";
	$result = $conexao->query($query);
	if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){ 
			$fotoBanco = $linha["tb03_foto"];       
		}
	}  
	
	$querydelete ="DELETE FROM tb03_brand WHERE tb03_id=$codigo";
    $resultadodelete = $conexao->query($querydelete);	
    
    if ($resultadodelete) {		
        unlink("../../../../assets/images/brands/".$fotoBanco);		
    }else{			
        echo "<h2>Erro ao excluir a imagem<h2>";
    }
    
    header("Location:../../../brand.php");
?>