<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb05_contact` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Nome</th>
                        <th scope='col' class='border-0'>Telefone</th>
                        <th scope='col' class='border-0'>E-mail</th>
                        <th scope='col' class='border-0'>Mensagem</th>
                        <th scope='col' class='border-0'>Data</th>
                        <th scope='col' class='border-0'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>";

        while ($linha = $result->fetch_assoc()){                
            echo "<tr>";
                echo "<td>".$linha["tb05_nome"]."</td>";
                echo "<td>".$linha["tb05_telefone"]."</td>";
                echo "<td>".$linha["tb05_email"]."</td>";
                echo "<td>".$linha["tb05_mensagem"]."</td>";
                echo "<td>".date('d/m/Y', strtotime($linha["tb05_data"]))."</td>";
                echo "<td>";  
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoContact(".$linha["tb05_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "Não há contatos por enquanto...";
    }        


?>