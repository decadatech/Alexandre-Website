$.ajax({
    url: 'assets/php/product/select-product.php',
    success: function(response) {
        $('.ajax-reponse-select-product').html(response);        
    },
});

$('#FormProduct').submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
        url: 'assets/php/product/add-product.php',
        type: 'POST',
        data: formData,                  
        success: function (result) {
                
            $('#FormProduct input').val(''); //LIMPA OS INPUTS 
            $('#addProductModal').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/product/select-product.php',
                success: function(response) {
                    $('.ajax-reponse-select-product').html(response);        
                },
            });                    
        },
        Error: function () {
            $('#FormProduct input').val(''); //LIMPA OS INPUTS
        },      
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }     
    });
});

//EDITAR OS DADOS DO PRODUTO NO BANCO VIA AJAX
$('.save').click(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/product/edit-product.php',
        type: 'POST',
        data:{
            nome: $('#edit-name').val(),
            descricao: $('#edit-description').val(),
            id: $('.save').data('id')  
        }
        ,                   
        success: function (result) {
                
            $('#editProductModal input').val(''); //LIMPA OS INPUTS 
            $('#editProductModal').modal('hide'); //FECHA O MODAL
            $('#editConfirmProductModal').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/product/select-product.php',
                success: function(response) {
                    $('.ajax-reponse-select-product').html(response);        
                },
            });
        },
        Error: function () {
            $('#editProductModal input').val(''); //LIMPA OS INPUTS
            $('#editProductModal').modal('hide'); //FECHA O MODAL
        },           
    });
});

// PERMITIR APENAS INSERÇÃO DE FOTO NA EXTENSÃO DE IMAGEM
function verificaExtensao($photo) {
    var extPermitidas = ['jpg', 'png', 'jpeg', 'svg', 'psd'];
    var extArquivo = $photo.value.split('.').pop();
  
    if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
        alert('Extensão "' + extArquivo + '" não permitida!');
        $("#photo").val('');
        $("#photoModal").val('');
    }
}

function editarProduct(id) {

    $('#editProductModal').modal('show'); //ABRE O MODAL

    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO
    $('#edit-name').val($(buttonId).data('nome'));
    $('#edit-description').val($(buttonId).data('descricao'));
    $('.save').data('id', id); 

}  


function confirmarExclusaoProduct(id) {
    var resposta = confirm("Deseja remover esse produto?");
    if (resposta == true) {
        window.location.href = "assets/php/product/delete-product.php?id="+id;
    }
}   