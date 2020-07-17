$.ajax({
    url: 'assets/php/select-about.php',
    success: function(response) {
        $('.ajax-reponse-select-about').html(response);        
    },
});