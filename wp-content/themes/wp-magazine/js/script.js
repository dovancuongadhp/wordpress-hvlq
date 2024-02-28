 jQuery(function($) { // DOM is now read and ready to be manipulated
  
    //Tab to top
    $(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('.scroll-top-wrapper').addClass("show");
    }
    else{
        $('.scroll-top-wrapper').removeClass("show");
    }
});
    $(".scroll-top-wrapper").on("click", function() {
     $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});



 $('.dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp(150)
    });

var count=0;
$('.dropdown .caret').on('click',function(e){
    e.preventDefault();
  if (count===0){
    $(this).closest( "li" ).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    count++;
  }
  else
  {
    $(this).closest( "li" ).find('.dropdown-menu').first().stop(true, true).slideUp(150);
    count=0;
  }

 });



var stickyOffset = ( jQuery(".sticky-header").offset() || { "top": NaN } ).top;

if ( ! isNaN( stickyOffset ) ) {

  jQuery(window).scroll(function(){
    var sticky = jQuery(".sticky-header");
        scroll = jQuery(window).scrollTop();
      
    if (scroll >= stickyOffset) sticky.addClass("fix-top");
    else sticky.removeClass("fix-top");
  });
}


window.onscroll = function(){
  
  /* height scrolled from top */
  var scrolled_top = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
  
  /* total scrollable height */
  var to_scroll = (document.documentElement.scrollHeight || document.body.scrollHeight) - (document.documentElement.clientHeight || document.body.clientHeight || window.innerHeight) 
  
  /* percentage of height scrolled */
  var horizontal_width = (scrolled_top/to_scroll)*100;
  
  /* assigning calculated width to progress bar */
  document.getElementById('horizontal_scroll').style.width = horizontal_width + '%';
}


window.onload = function() {
  var ad_blocker_element = document.getElementById("disable-ad-blocker");

  if( ad_blocker_element ) {

    setTimeout(function() {

      if ( typeof(window.google_jobrunner) === "undefined" ) {
        ad_blocker_element.innerHTML = wp_magazine_scripts_var.ad_blocker_msg;
      }

    }, 2000);

  }

};



$('.owl-slider').owlCarousel({
      loop:false,
      margin:15,
      nav:false,
      dots:true,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })
$('.owl-slider-two').owlCarousel({
      loop:false,
      margin:15,
      nav:false,
      dots:true,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:2
          }
      }
  })




$('#owl-heading-1').owlCarousel({
      margin:15,
      nav:true,
      dots:false,
      loop:false,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{                      
                items:3, 
               // items: $('.owl-carousel .item').size() > 1 ? true:1, 
          }
      }
  })

$('#owl-heading-2').owlCarousel({
      
      margin:20,
      nav:true,
      dots:false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })

$('#owl-news-c-1').owlCarousel({
      
      margin:15,
      nav:true,
      dots:true,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:3
          }
      }
  })

$('#owl-news-c-2').owlCarousel({
      loop:false,
      margin:15,
      nav:true,
      dots:true,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1100:{
              items:3
          },
          1300:{
              items:4
          }
      }
  })

$('#owl-news-c-3').owlCarousel({
      loop:false,
      margin:0,
      nav:true,
      dots:true,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1200:{
              items:3
          }
      }
  })
$('#owl-news-c-4').owlCarousel({
      loop:false,
      margin:0,
      nav:true,
      dots:false,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1200:{
              items:1
          }
      }
  })






$('.widget-instagram ul').addClass('owl-carousel');
$('.widget-instagram ul').owlCarousel({
      loop:false,
      margin:1,
      nav:true,
      dots:false,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          },
          1440:{
                items: 8
          }
      }
  })



$('#site-navigation .menu-toggle').click(function(){
    $('#site-navigation .menu-toggle #nav-icon').toggleClass('open');
  });




});