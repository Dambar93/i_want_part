require('./bootstrap');

$(document).ready(function(){
    var maxField = 10; 
    var addButton = $('.add_button'); 
    var wrapper = $('.field_wrapper'); 
    var fieldHTML = `<div><input type="text" name="code[]" value="" placeholder="Additional part Code" /><a href="javascript:void(0);" class="remove_button">Remove code</a></div>`; 
    var x = 1;
    
    $(addButton).click(function(){
        
        if(x < maxField){ 
            x++;
            $(wrapper).append(fieldHTML); 
        }
    });
    
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); 
        x--; 
    });

});

$(document).ready(function(){
    var zoom = document.getElementsByClassName("carousel-item");
    var undoZoom = document.getElementById("close-overlay");
    var zoom1 = document.getElementById("gallery");
    var remove = document.getElementById("carouselExampleIndicators");



    console.log(zoom1.className)
    $(zoom).click(() => {zoom1.classList.add("overlay"); console.log('cliick'); remove.classList.remove("carousel-mod")});
    $(undoZoom).click(() => {zoom1.classList.remove("overlay");console.log('cliick'); remove.classList.add("carousel-mod")});
    
});

window.onload = () => {
    // (A) GET ALL IMAGES
    let all = document.getElementsByClassName("zoomE");
   
    // (B) CLICK TO GO FULLSCREEN
    if (all.length>0) { for (let i of all) {
      i.onclick = () => {
        // (B1) EXIT FULLSCREEN
        if (document.fullscreenElement != null || document.webkitFullscreenElement != null) {
          if (document.exitFullscreen) { document.exitFullscreen(); }
          else { document.webkitCancelFullScreen(); }
        }
   
        // (B2) ENTER FULLSCREEN
        else {
          if (i.requestFullscreen) { i.requestFullscreen(); }
          else { i.webkitRequestFullScreen(); }
        }
      };
    }}
  };




