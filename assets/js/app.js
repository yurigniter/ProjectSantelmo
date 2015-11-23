var main = function() {
  /* Push the body and the nav over by 285px over */
  $('.icon-menu').click(function() {
    $('.menu').animate({
      right: "0px"
    }, 200);
    $('#googleMap').animate({
      left: "-285px"
    }, 200);

  });

  /* Then push them back */
  $('.icon-close').click(function() {
    $('.menu').animate({
      right: "-285px"
    }, 200);
    $('#googleMap').animate({
      left: "0px"
    }, 200);
  });

  $('.gosh-ka').click(function() {
        $("i").toggleClass("fa-arrow-circle-up");  
  });

//  $(".gosh-ka").find("i").remove(".fa-arrow-circle-down");

};


$(document).ready(main);

