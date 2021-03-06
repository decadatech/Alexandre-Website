$.ajax({
    url: 'assets/php/brand/select-brand.php',
    success: function(response) {
        $('.ajax-reponse-select-brand').html(response);        
    },
});

$('#FormBrand').submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
        url: 'assets/php/brand/add-brand.php',
        type: 'POST',
        data: formData,                  
        success: function (result) {
                
            $('#FormBrand input').val(''); //LIMPA OS INPUTS 
            $('#addBrandModal').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/brand/select-brand.php',
                success: function(response) {
                    $('.ajax-reponse-select-brand').html(response);        
                },
            });         
        },
        Error: function () {
            $('#FormBrand input').val(''); //LIMPA OS INPUTS
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
        url: 'assets/php/brand/edit-brand.php',
        type: 'POST',
        data:{
            nome: $('#edit-name').val(),
            id: $('.save').data('id')  
        }
        ,                   
        success: function (result) {
                
            $('#editBrandModal input').val(''); //LIMPA OS INPUTS 
            $('#editBrandModal').modal('hide'); //FECHA O MODAL
            $('#editConfirmBrandModal').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/brand/select-brand.php',
                success: function(response) {
                    $('.ajax-reponse-select-brand').html(response);        
                },
            });
        },
        Error: function () {
            $('#editBrandModal input').val(''); //LIMPA OS INPUTS
            $('#editBrandModal').modal('hide'); //FECHA O MODAL
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

function editarBrand(id) {

    $('#editBrandModal').modal('show'); //ABRE O MODAL

    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO
    $('#edit-name').val($(buttonId).data('nome'));
    $('.save').data('id', id); 

}  


function confirmarExclusaoBrand(id) {
    var resposta = confirm("Deseja remover essa marca?");
    if (resposta == true) {
        window.location.href = "assets/php/brand/delete-brand.php?id="+id;
    }
}   