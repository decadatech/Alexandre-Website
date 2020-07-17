$.ajax({
    url: 'assets/php/select-product.php',
    success: function(response) {
        $('.ajax-reponse-select-product').html(response);        
    },
});

$('#product-select').change(function() {
    var id = $(this).val();
    window.location = "?c="+id;
});

document.onmousedown=disableclick;
function disableclick(event)
{
  if(event.button==2)
   {
     return false;    
   }
}