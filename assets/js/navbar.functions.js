/* Open the sidenav */
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

$(window).on('scroll', function(){
    if($(window).scrollTop()){
        $('nav').addClass('navSm');
        $('nav').removeClass('navLg');

        $('.itens-desktop-nav ul li a').removeClass('light-text');
        $('.itens-desktop-nav ul li a').addClass('dark-text');
    }else {
        $('nav').removeClass('navSm');
        $('nav').addClass('navLg');

        $('.itens-desktop-nav ul li a').removeClass('dark-text');
        $('.itens-desktop-nav ul li a').addClass('light-text');
    }
})
