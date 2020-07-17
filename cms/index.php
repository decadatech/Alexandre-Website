<?php
  include_once "../assets/php/conexao.php";
  include_once "assets/php/login/verificado-login.php";
  date_default_timezone_set('America/Sao_Paulo');

?>

<html>

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">

  <title>CMS</title>
 
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class=" border-right" id="sidebar-wrapper">
      <div style="display: flex; justify-content: center; align-items: center; padding: 30px auto; margin: 15px auto;">
        <h3>Páginas</h3>
      </div>
      <div class="list-group list-group-flush">
        <a style="background-color: #242424; color: white" href="index.php" class="list-group-item list-group-item-action">
          HOME
        </a>     
        <a href="product.php" class="list-group-item list-group-item-action">
          PRODUTO
        </a>   
        <a href="brand.php" class="list-group-item list-group-item-action">
          MARCAS
        </a>   
        <a href="about.php" class="list-group-item list-group-item-action">
          SOBRE
        </a> 
        <a href="contact.php" class="list-group-item list-group-item-action">
          CONTATO
        </a>       
        <a href="user.php" class="list-group-item list-group-item-action">
          USUÁRIO
        </a>
        <!-- <a href="plans.php" class="list-group-item list-group-item-action ">
          PLANOS
        </a>
        <a href="services.php" class="list-group-item list-group-item-action ">
          SERVIÇOS
        </a>
        <a href="about.php" class="list-group-item list-group-item-action ">
          SOBRE NÓS
        </a>
        <a href="work.php" class="list-group-item list-group-item-action ">
          TRABALHE CONOSCO
        </a>
        <a href="contact.php" class="list-group-item list-group-item-action ">
          CONTATO
        </a>
        <a href="user.php" class="list-group-item list-group-item-action ">
          USUÁRIOS
        </a>         -->
      </div>
    </div>
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
        <button style="margin: 2px" class="btn btn-secondary" id="menu-toggle"> <span class="navbar-toggler-icon"></span> </button>
        <a style="margin: 2px" href="assets/php/login/logout.php" class="btn btn-danger"> Sair </a>
      </nav>
      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2>Aviso na Home</h2>  
        </div>
      </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <div class="form-group">
              <form method="POST" id="FormMessage">
                <label for="message">Mensagem</label>
                <?php
                  $query = "SELECT * FROM `tb02_warning` WHERE 1 LIMIT 1";
                  $result = $conexao->query($query);
              
                  if($result->num_rows>0) { 
                    while ($linha = $result->fetch_assoc()){    
                      $mensagem = $linha['tb02_mensagem'];
                    }
                  }

                ?>
                <textarea class="form-control" id="message" rows="3" name="message" required><?php echo $mensagem; ?></textarea>
                <hr>
                <button type="submit" class="btn btn-success save">Editar</button>                                              
              </form>
          </div>          
        </div>
      </div>    
      
      <!-- MODAL ALERT -->
      <div id="alertModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Alteração feita!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Seu alerta foi alterado com sucesso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

  </div>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <!-- INDEX JS -->
  <script src="assets/js/indexCMS.js"></script>

  <script>
    $(document).ready(function() {
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });     
    });
  </script>

</body>

</html>