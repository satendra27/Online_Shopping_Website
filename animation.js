var responsiveSlider = function() {

    var slider = document.getElementById(".slide");
    var sliderWidth = slider.offsetWidth;

    var count = 1;
    var items = slideList.querySelectorAll("slide").length;
    var prev = document.getElementById("Prev");
    var next = document.getElementById("Next");
    
    window.addEventListener('resize', function() {
      sliderWidth = slider.offsetWidth;
    });
    
    var goPrev = function() {
      if(count > 1) {
        count = count - 2;
        slideList.style.left = "-" + count * sliderWidth + "px";
        count++;
      }
      else if(count = 1) {
        count = items - 1;
        slideList.style.left = "-" + count * sliderWidth + "px";
        count++;
      }
    };
    
    var gonext = function() {
      if(count < items) {
        slideList.style.left = "-" + count * sliderWidth + "px";
        count++;
      }
      else if(count = items) {
        slideList.style.left = "0px";
        count = 1;
      }
    };
    
    next.addEventListener("click", function() {
      gonext();
    });
    
    prev.addEventListener("click", function() {
      goPrev();
    });
    
    setInterval(function() {
      gonext()
    }, 8000);
    
    };
    
    window.onload = function() {
    responsiveSlider();  
    }