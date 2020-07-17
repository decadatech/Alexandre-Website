$.ajax({
    url: 'assets/php/contact/select-contact.php',
    success: function(response) {
        $('.ajax-reponse-select-contact').html(response);        
    },
});

function confirmarExclusaoContact(id) {
    var resposta = confirm("Deseja remover esse contato?");
    if (resposta == true) {
        window.location.href = "assets/php/contact/delete-contact.php?id="+id;
    }
}   
