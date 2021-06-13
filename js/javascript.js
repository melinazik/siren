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
            i++;
            if (i > 30) return;
            c.scrollTop = a + (b - a) / 30 * i;
            setTimeout(function() { scroll(c, a, b, i); }, 20);
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
$(window).on("load", function() {
    $(".loader").fadeOut("slow");
});

const imgDiv = document.querySelector('.profile-img');
const img = document.querySelector('#photo-prof');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#upload-btn');

file.addEventListener('change', function() {
    const chosenFile = this.files[0];

    if (chosenFile) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(chosenFile);
    }
});

function addFavorites(element) {
    // element is the carousel-image-container element that called
    // addFavorites with onclick
    console.log(element.childNodes[0].childNodes[0].childNodes[0].childNodes[1]);
    var src = element.childNodes[0].childNodes[0].childNodes[0].childNodes[0].getAttribute("src");
    if (src == "../imgs/heart-empty.png") {
        element.childNodes[0].childNodes[0].childNodes[0].childNodes[0].src = '../imgs/heart-full.png';
        element.childNodes[0].childNodes[0].childNodes[1].innerHTML = "remove from favorites";
    } else {
        element.childNodes[0].childNodes[0].childNodes[0].childNodes[0].src = '../imgs/heart-empty.png';
        element.childNodes[0].childNodes[0].childNodes[1].innerHTML = "add to favorites";

    }

}

function callAddArticle() {
    document.getElementById('add-article').style.display = 'block';
}

function callSeeMessages() {
    //document.getElementById('').style.display='block'" style="width:150px;
}


var elem;
var flkty;

function init() {
    elem = document.querySelector('#carousel-effects');
    flkty = new Flickity(elem, {
        wrapAround: true,
        autoPlay: true
    });
}


function loadEffectsArticles(articleTitle, articleURL, articleImg, numberOfLikes, favorite) {

    var carousel_container = document.getElementById('carousel-effects');

    // while more elements in database
    var carousel_cell = document.createElement('div');
    carousel_cell.classList.add('carousel-cell');

    var carousel_image_container = document.createElement('div');
    carousel_image_container.classList.add('carousel-image-container');
    carousel_image_container.setAttribute("onclick", "addFavorites(this)");

    var overlay = document.createElement('div');
    overlay.classList.add('overlay');

    var add_favorites = document.createElement("div");
    add_favorites.classList.add("add-favorites");

    var heart_container = document.createElement("div");
    heart_container.classList.add("heart-container");

    var heart = document.createElement('img');
    heart.classList.add("heart");
    if (favorite == 0) {
        heart.src = '../imgs/heart-empty.png';
    } else {
        heart.src = '../imgs/heart-full.png';
    }

    var likes = document.createElement('p');
    likes.classList.add("likes");
    likes.textContent = numberOfLikes;

    heart_container.appendChild(heart);
    heart_container.appendChild(likes);

    var favorites_add_text = document.createElement("p");
    favorites_add_text.classList.add("favorites-add-text");
    if (favorite == 0) {
        favorites_add_text.textContent = "add to favorites";
    } else {
        favorites_add_text.textContent = "remove from favorites";
    }


    add_favorites.appendChild(heart_container);
    add_favorites.appendChild(favorites_add_text);

    overlay.appendChild(add_favorites);

    var carousel_image = document.createElement("img");
    carousel_image.classList.add("carousel-image");
    carousel_image.src = articleImg;

    carousel_image_container.appendChild(overlay);
    carousel_image_container.appendChild(carousel_image);

    var a = document.createElement("a");
    a.href = articleURL;
    a.target = "_blank";

    var carousel_article_title = document.createElement("div");
    carousel_article_title.classList.add("carousel-article-title");
    carousel_article_title.textContent = articleTitle;

    a.appendChild(carousel_article_title);

    carousel_cell.appendChild(carousel_image_container);
    carousel_cell.appendChild(a);

    console.log(flkty);
    flkty.append(carousel_cell);
}

function loadCausesArticles() {

}