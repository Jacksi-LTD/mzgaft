/*------------- #General --------------*/


var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});


$('a[href="#"]').click(function ($) {
        $.preventDefault();
    });


$('.boxes-col-container .box-wrap .box-body').matchHeight();
$('.categories-container .category-wrap .category-').matchHeight();

/*------------- #news col-style functions   --------------*/

$('.news-same-h').matchHeight();

$('.news-area .news-box.col-style .news-content').matchHeight();


/*------------- #navbar functions   --------------*/

$("#navToggler").click(function () {

         $(".top-page").addClass("mobilePanelOpen");
         $("body").attr("id", "noScroll");
        
     });

$("#mobileClose , .mobile-menu-overlay").click(function () {

         $(".top-page").removeClass("mobilePanelOpen");
         $("body").removeAttr("id"); 
        
     });

$(".h-menu").on( "click " , function () {
         
         var current_tab = $(this).parent().find('.dropdown-list');

         if ($(this).hasClass('show')) {

             $(this).removeClass("show");
             $(current_tab).removeClass("show");
             
         }
         else {


             $(".h-menu").removeClass("show");
             $(this).addClass("show");

             $(".dropdown-list").removeClass("show");
             $(current_tab).addClass("show");

         }
         

     });


$(document).click(function (e) {

         if (!(($(e.target).closest('.dropdown-list').length > 0) ||

                 ($(e.target).closest('.h-menu').length > 0))) {

                    $(".h-menu").removeClass("show");
                    $(".dropdown-list").removeClass("show");
         }
             
     });
  


$("#searchBtn").click(function(){
        
        $('.top-page .search-box').toggleClass('active');
		
		
  });
$("#closeSearchpopup").click(function(){
        
        $('.top-page  .search-box').removeClass('active');
		
		
  });

$(document).click(function (e) {

         if (!(($(e.target).closest('.top-page .search-box').length > 0) ||

                 ($(e.target).closest('#searchBtn').length > 0))) {

                    $('.top-page  .search-box').removeClass('active')
         }
             
});


function searchPopupheight(){
    
 
    if (window.matchMedia('(max-width: 767.98px)').matches) {
        
           let search_popup_height= document.querySelector(".navbar-banner").clientHeight;    
           $('.top-bar .bar-content .search-box').css("min-height" , search_popup_height );
    }else{
        
        $('.top-bar .bar-content .search-box').css("min-height" , "auto" );
    }
     
}

$(window).on("load", function(){

    searchPopupheight();

});

$(window).resize(() => {
        
    searchPopupheight(); 
    
});



/*------------- #Swiper --------------*/

$(".single-slider").each(function(index, element){
    var $this = $(this);
    $this.addClass("instance-" + index);
    $this.parent().find(".btn-prev").addClass("btn-prev-" + index);
    $this.parent().find(".btn-next").addClass("btn-next-" + index);
    var swiper = new Swiper(".instance-" + index, {
        spaceBetween: 24,
        grabCursor: true,
        navigation: {
          nextEl: ".btn-next-" + index ,
          prevEl: ".btn-prev-" + index ,
        },
        pagination: {
          el: ".swiper-pagination",
            
          clickable: true,
        },
        autoplay: {
          delay: 3500,
          disableOnInteraction: true,
        },
    });
});

 var swiper = new Swiper(".books-slider", {
        slidesPerView: 1,
        spaceBetween: 24,
        grabCursor: true,
        scrollbar: {
          el: ".swiper-scrollbar",
          hide: true,
        },
        pagination: {
          el: ".swiper-pagination",
          
        },
        
        breakpoints: {
        
          480: {
            slidesPerView: 2,
           
          },
            
          768: {
            slidesPerView: 3,
            
            
          },
            
          992: {
            slidesPerView: 4,
            
          },
            
          1400: {
            slidesPerView: 5,
            
          },  
        },
     
         autoplay: {
          delay: 2500,
          disableOnInteraction: true,
        },
     
     
        
      });



/*------------- #accordion-panels   --------------*/

$(function(){
    
    $(".panel-item .panel-header").click(function(){
        
        let $next = $(this).next(".panel-body");
        $(this).parent().toggleClass("active");
        $(this).next(".panel-body").slideToggle();
        $('.accordion-panels .panel-item .panel-body').not($next).slideUp().parent().removeClass('active');
		
  });
    
    
});

/*------------- #scroll-top btn   --------------*/

$(window).scroll(function() {
          
        if ($(this).scrollTop() > 200) {
            $('.scrollup').addClass("scroll")
        } else {
            $('.scrollup').removeClass("scroll");
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


/*------------- #AddReadMore --------------*/
/*
function AddReadMore() {
    

    $(".ReadMoree").each(function() {
        

        var allstr = $(this).text();
        var carLmt = $(this).attr('data-length');
        
        if (allstr.length > carLmt) {
            var trimmedString = allstr.substring(0, carLmt);
            trimmedString = trimmedString.substring(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")));
            var strtoadd = trimmedString  ;
            $(this).html(strtoadd);
        }
      

    });
   
}
$(window).on("load", function(){

    AddReadMore();
    
    

});

*/



