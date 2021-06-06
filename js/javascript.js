// function to "dive" from home page to articles
window.smoothScroll = function(target) {
    var scrollContainer = target;
    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);

    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);

    scroll = function(c, a, b, i) {
        i++; if (i > 30) return;
        c.scrollTop = a + (b - a) / 30 * i;
        setTimeout(function(){ scroll(c, a, b, i); }, 20);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}

function myFunction() {
    var x = document.getElementById("navbarID");
    if (x.className === "right-navbar") {
      x.className += " responsive";
    } else {
      x.className = "right-navbar";
    }
  }

  // loading icon
  $(window).on("load", function(){
    $(".loader").fadeOut("slow");
  });

  const imgDiv = document.querySelector('.profile-img');
  const img = document.querySelector('#photo-prof');
  const file = document.querySelector('#file');
  const uploadBtn = document.querySelector('#upload-btn');

  file.addEventListener('change', function(){
    const chosenFile = this.files[0];

    if(chosenFile){
      const reader = new FileReader();

      reader.addEventListener('load',function(){
        img.setAttribute('src', reader.result);
      });

      reader.readAsDataURL(chosenFile);
    }
  });
