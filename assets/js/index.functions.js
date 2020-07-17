$( document ).ready(function() {

  const viewAlarm = sessionStorage.getItem('viewAlarm');

  if (!viewAlarm) {
    $('#alert').modal('show');
  }

  $('#alert').on('hidden.bs.modal', function () {
    sessionStorage.setItem('viewAlarm', true);
  });

  $('.owl-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0:{
        items:1,
      },
      600:{
        items:3,
      },
      1000:{
        items:5,
        loop:false
      }
    }
  })
});

$.ajax({
  url: 'assets/php/select-warning.php',
  success: function(response) {
      $('.ajax-reponse-select-warning').html(response);        
  },
});