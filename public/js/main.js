/*------------- #General --------------*/


var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});


$('a[href="#"]').click(function ($) {
        $.preventDefault();
    });



/*------------- #loading-overlay-btn function  --------------*/


function loading_overlay (){


    btn = $(this);
    btn.addClass('loading-overlay');
    setTimeout(function() {
      btn.removeClass('loading-overlay');
      btn.toggleClass('active')
    }, 1000);

}

$('.loading-btn').click(loading_overlay);


/*------------- #scroll-top btn   --------------*/

$(window).scroll(function() {

        if ($(this).scrollTop() > 200) {
            $('.scrollup').addClass("show")
        } else {
            $('.scrollup').removeClass("show");
            $('.scrollup').removeClass("active")

        }
    });

$('.scrollup').click(function(e){

    e.preventDefault();

    $(this).addClass('active');
    $('html,body').animate({

        scrollTop:0},1000);

     document.documentElement.style.setProperty('scroll-behavior', 'auto');

     setTimeout(function() {

       document.documentElement.style.setProperty('scroll-behavior', 'smooth');

    }, 1000);


});





$('.date').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'en',
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.datetime').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    locale: 'en',
    sideBySide: true,
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.timepicker').datetimepicker({
    format: 'HH:mm:ss',
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })
