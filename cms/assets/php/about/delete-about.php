<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="DELETE FROM tb06_about WHERE tb06_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
		if ($resultadodelete) {		
			header ("Location: ../../../about.php");	
		}else{			
			echo "<h2>Erro ao excluir o sobre<h2>";
		}
	mysqli_close($conexao);

?>