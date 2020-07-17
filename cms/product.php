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
        <a href="index.php" class="list-group-item list-group-item-action">
          HOME
        </a>     
        <a style="background-color: #242424; color: white" href="product.php" class="list-group-item list-group-item-action">
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
          <h2>Adicionar produto</h2>  
        </div>
      </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <form method="POST" id="FormProduct" enctype="multipart/form-data"> 
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" required/>
            </div>
            <div class="form-group">
              <label for="description">Descrição</label>
              <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
            </div>
            <div class="form-group">
              <label for="photo">Foto do produto</label>
              <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg" onchange="verificaExtensao(this)" required/>
            </div>            
            <hr>
            <button type="submit" class="btn btn-success">Adicionar</button>                                                                   
          </form>
        </div>
      </div>   
      
      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2> Usuários</h2>  
          <div class="ajax-reponse-select-product"></div>
        </div>
      </div>

    </div>

    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Editar Produto</h5>
            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="FormModalProducts">
              <div class="form-row">                                
                <div class="form-group col-md-12">
                  <label for="edit-name">Nome</label>
                  <input type="text" class="form-control" name="edit-name" id="edit-name" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="edit-description">Descrição</label>
                  <textarea class="form-control" id="edit-description" rows="3" name="edit-description" required></textarea>
                </div>
              </div>                                                                 
            </form>
          </div>
          <div class="modal-footer">                         
            <button type="submit" class="btn btn-success save">Editar</button>            
            <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL ALERT -->
    <div id="addProductModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adição feita!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <p>Seu produto foi inserido com sucesso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>    

    <!-- MODAL ALERT -->
    <div id="editConfirmProductModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edição feita!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <p>Seu produto foi editado com sucesso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="assets/js/productCMS.js"></script>

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