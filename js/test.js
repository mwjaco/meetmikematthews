$(function() {  
  $("input.modal-state").on("change", function() {


    var chosenClip = $(this).attr('data-clip');
    

    $('div.modal-content[data-clip="' + chosenClip + '"], div.video-wrapper[data-clip="' + chosenClip + '"]').toggle();    
    
    var video = $('div.video-wrapper[data-clip="' + chosenClip + '"] iframe').attr("src");
    

    $('div.video-wrapper[data-clip="' + chosenClip + '"] iframe').attr("src","");
    

    if ($(this).is(":checked")) {   
      $("body").addClass("modal-open");
    } else {      
      $('div.video-wrapper[data-clip="' + chosenClip + '"] iframe').attr("src","");
      $("body").removeClass("modal-open");
    }    
  });

// Stop play fix on iframes

  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();    
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });
});