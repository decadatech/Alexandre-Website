//ADICIONAR OS DADOS DO REGISTRAR NO BANCO VIA AJAX
$('#FormMessage').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/index/update-warning.php',
        type: 'POST',
        data: $('#FormMessage').serialize(),                  
        success: function (result) {                
            $('#alertModal').modal('show'); //ABRE O MODAL             
        },                
    });
});