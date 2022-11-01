//Animation
//AOS.init();
//Counter

//scroll function for header change bg-color

window.onscroll = function () {
  myFunction();
};

function myFunction() {
  if (document.documentElement.scrollTop > 100) {
    document.getElementById("header").style.backgroundColor = "white";
    document.getElementById("header").style.boxShadow =
      "rgba(0, 0, 0, 0.24) 0px 3px 8px";
  } else {
    document.getElementById("header").style.background = "none";
    document.getElementById("header").style.boxShadow = "none";
  }
}

//animation css for index page

function animation() {
  var reveals = document.querySelectorAll(
    ".text-col, text-cols, .rotation, .opaque, .scales, .down, .jos-col, .first-arr, .second-arr, .build, .right, .left"
  );

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", animation);


// close cookies

function cookies() {
  let cookie = document.getElementById("cookies");

  cookie.style.display = "none"
}

// play video button

var vid = document.getElementById("video"); 
let play = document.getElementById("play");
let pause = document.getElementById("pause");

function playVid() { 
  vid.play(); 
  play.style.display = "none"
  pause.style.display = "block"
} 

function pauseVid() { 
  vid.pause(); 
  play.style.display = "block"
  pause.style.display = "none"
} 


// read more text
function Changetext() {
  let more = document.getElementById("readmore");
  let icon = document.getElementById("readicon");

  if (more.innerHTML === "Read more ") {
    more.innerHTML = "Read Less";
    icon.style.display = "none";
  } else {
    more.innerHTML = "Read more ";
    icon.style.display = "block";
  }
}


// see password
function Seepassword() {
  let input = document.getElementById("pass");
  let eye = document.getElementById("eye");
  let cancel = document.getElementById("cancel")


  if ( input.type === "password") {
    input.type = "text"
    eye.style.display = "none"
    cancel.style.display = "block"
  } else {
    input.type = "password"
    eye.style.display = "block"
    cancel.style.display = "none"
  }

}

// hide password
function Hidepassword() {
  let input = document.getElementById("pass");
  let eye = document.getElementById("eye");
  let cancel = document.getElementById("cancel");

  if ( input.type === "text") {
    input.type = "password"
    eye.style.display = "block"
    cancel.style.display = "none"
  } 
 }

 // see password
function Seeregpassword() {
  let input = document.getElementById("pass");
  let eye = document.getElementById("eye");
  let cancel = document.getElementById("cancel")


  if ( input.type === "password") {
    input.type = "text"
    eye.style.display = "none"
    cancel.style.display = "inline-block"
  } else {
    input.type = "password"
    eye.style.display = "inline-block"
    cancel.style.display = "none"
  }

}
// hide password
function Hideregpassword() {
  let input = document.getElementById("pass");
  let eye = document.getElementById("eye");
  let cancel = document.getElementById("cancel");

  if ( input.type === "text") {
    input.type = "password"
    eye.style.display = "inline-block"
    cancel.style.display = "none"
  } 
 }

 // see password
function Seeconfirmregpassword() {
  let input = document.getElementById("cpass");
  let eye = document.getElementById("eyeconfirm");
  let cancel = document.getElementById("cancelconfirm")


  if ( input.type === "password") {
    input.type = "text"
    eye.style.display = "none"
    cancel.style.display = "inline-block"
  } else {
    input.type = "password"
    eye.style.display = "inline-block"
    cancel.style.display = "none"
  }

}
// hide password
function Hideconfirmregpassword() {
  let input = document.getElementById("cpass");
  let eye = document.getElementById("eyeconfirm");
  let cancel = document.getElementById("cancelconfirm");

  if ( input.type === "text") {
    input.type = "password"
    eye.style.display = "inline-block"
    cancel.style.display = "none"
  } 
 }