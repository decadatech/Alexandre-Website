<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="DELETE FROM tb05_contact WHERE tb05_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
		if ($resultadodelete) {		
			header ("Location: ../../../contact.php");	
		}else{			
			echo "<h2>Erro ao excluir o contato<h2>";
		}
	mysqli_close($conexao);

?>