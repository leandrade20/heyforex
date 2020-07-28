( function( $ ) {
    var estado = 0,
    vw = $(window).width();
$(".mobile-menu-toggle").click(function() {
  var delay_time = 0;
  $(this).toggleClass('open');
  console.log(estado);
  if (estado === 0) {
    TweenMax.to($(".mobile-menu-container"), 1, {
      x:-vw,
      ease: Expo.easeInOut
    });
    
    $("li").each(function() {
      TweenMax.to($(this), 1.2, {
        x:-vw,
        scaleX: 1,
        delay: delay_time,
        ease: Expo.easeInOut
      });
      delay_time += .04;
    });
    estado = 1;
  } else {
    estado = 0;
    TweenMax.to($(".mobile-menu-container"), 1.2, {
      x:0,
      ease: Expo.easeInOut
    });
    $("li").each(function() {
      TweenMax.to($(this), 1, {
        x:0,
        /*
        x:vw,
        scaleX: 2.3,
        */
        delay: delay_time,
        ease: Expo.easeInOut
      });
      delay_time += .02;
    });
  }
});
/*
  if (estado === 0) {
    $("#bg-menu-mobile").animate({
      top: 0,
      right: 0
    }, {
      duration: 520,
      easing: "easeInOutStrong"
    });

    $("ul").delay(50).animate({
      top:"50px", 
      left:"40px"
    }, { duration:640, easing:"easeInOutStrong" });

    $("li").each(function() {
      TweenMax.to($(this), 0.7, {"left": "40px", opacity: 1, delay: delay_time, ease: Power2.easeInOut});
      delay_time += 25;
    });
    estado = 1;
  } else {
    // 
    $("#bg-menu-mobile").delay(300).animate({
      top: 0,
      right: "-100%"
    }, {
      duration: 650,
      easing: "easeInOutStrong"
    });

    $("li").each(function() {
      $(this).delay(delay_time).animate({
        "left": "100%",
        opacity: 0
      }, {
        duration: 720,
        easing: "easeInOutStrong"
      });
      delay_time += 20;
    });
    estado = 0;
  }
  console.log(estado);

});
*/

}(jQuery))