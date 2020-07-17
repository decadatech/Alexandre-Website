//ADICIONAR OS DADOS DO CONTATO NO BANCO VIA AJAX
$('#FormContact').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/add-contact-form.php',
        type: 'POST',
        data: $('#FormContact').serialize(),                  
        success: function (result) {
                
            $('#FormContact input').val(''); //LIMPA OS INPUTS 
            $('#FormContact textarea').val(''); 
            $('#addModal').modal('show'); //ABRE O MODAL   
        },
        Error: function () {
            $('#FormContact input').val(''); //LIMPA OS INPUTS
            $('#FormContact textarea').val('');
        },           
    });
});

//MASK DO FORMULÁRIO DE CONTATO
$(document).ready(function() {
    $('#phone').mask('(00) 0000-00009');
    $('#phone').blur(function(event) {
        if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
            $('#phone').mask('(00) 00000-0009');
        } else {
            $('#phone').mask('(00) 0000-00009');
        }
    }); 
}); 
