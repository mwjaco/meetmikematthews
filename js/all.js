jQuery(document).ready(function($){

// Background
onTop = {}

// // Modal
onTop.modalizer = function() {
  $("input.modal-state").on("change", function() {
    var chosenClip = $(this).attr('data-clip');    
    $('div.modal-content[data-clip="' + chosenClip + '"], div.video-wrapper[data-clip="' + chosenClip + '"]').toggle();
    var video_url = $('div.video-wrapper[data-clip="' + chosenClip + '"] iframe').attr("data-src");       
    $('div.video-wrapper[data-clip="' + chosenClip + '"] iframe').attr("src",video_url);       
    if ($(this).is(":checked")) {   
      $("body").addClass("modal-open");
    } else {      
      $('div.video-wrapper[data-clip="' + chosenClip + '"] iframe').attr("src","");
      $("body").removeClass("modal-open");
    }  
  });
  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();    
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });  
}

onTop.portfolioBkgrd = function(){
  $( ".portfolio-list li" ).hover(
    // handlerIn
    function() {
      var portfolioImg = $(this).find('input').attr("data-img");
      $('main.sidebar .sidebar-wrapper').css("background-image", "url('" + portfolioImg + "')");
    },
    // handlerOut
    function(){
      
    }
  );  
}
onTop.moveWorkMenu = function(){
  if ($(window).innerWidth() < 601) {
    $('.nav-wrapper').insertAfter('.page-header');
  } else {
    $('.nav-wrapper').insertAfter('.modal');
  }
}
$(window).load(function() {
  $(".loader").fadeOut("slow");
})

$(document).ready(function(){
  onTop.modalizer();
  $('.modal-content').css('height',$( window ).height()*0.8);  
  if ($("body.work").length) {
    onTop.moveWorkMenu();  
    onTop.portfolioBkgrd();  
    $(window).resize(function() {
      onTop.moveWorkMenu();  
    });
  }
});
})