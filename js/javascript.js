// function to "dive" from home page to articles
window.smoothScroll = function (target) {
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

  scroll = function (c, a, b, i) {
    i++; if (i > 30) return;
    c.scrollTop = a + (b - a) / 30 * i;
    setTimeout(function () { scroll(c, a, b, i); }, 20);
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
$(window).on("load", function () {
  $(".loader").fadeOut("slow");
});

// favorites
function addFavorites(element) {
  // element is the carousel-image-container element that called 
  // addFavorites with onclick

  var src = element.childNodes[1].childNodes[1].childNodes[1].getAttribute("src");
  if (src == "../imgs/heart-empty.png") {
    element.childNodes[1].childNodes[1].childNodes[1].src = '../imgs/heart-full.png';
    element.childNodes[1].childNodes[1].childNodes[3].innerHTML = "remove from favorites";
  } else {
    element.childNodes[1].childNodes[1].childNodes[1].src = '../imgs/heart-empty.png';
    element.childNodes[1].childNodes[1].childNodes[3].innerHTML = "add to favorites";

<<<<<<< HEAD
      reader.readAsDataURL(chosenFile);
    }
  });

  function addFavorites(element) {
  // element is the carousel-image-container element that called
  // addFavorites with onclick
  var src = element.childNodes[1].childNodes[1].childNodes[1].getAttribute("src");
  if (src == "../imgs/heart-empty.png") {
    element.childNodes[1].childNodes[1].childNodes[1].src = '../imgs/heart-full.png';
    element.childNodes[1].childNodes[1].childNodes[3].innerHTML = "remove from favorites";
  } else {
    element.childNodes[1].childNodes[1].childNodes[1].src = '../imgs/heart-empty.png';
    element.childNodes[1].childNodes[1].childNodes[3].innerHTML = "add to favorites";

  }
=======
  }
}
>>>>>>> parent of d0cc48d... Add files via upload
