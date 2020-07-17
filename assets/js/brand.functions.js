$.ajax({
    url: 'assets/php/select-brand.php',
    success: function(response) {
        $('.ajax-reponse-select-brand').html(response);        
    },
});
  