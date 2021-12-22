$(document).ready(function(){

  var slides = document.querySelectorAll('.slide');
  var btns = document.querySelectorAll('.btn');
  let currentSlide = 1;

  $(".icon").click(function(){
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
    x.className = "topnav";
    }
  });

  $("#submit").click(function() {
    if ($("#search").val() === "Search...") {
      alert("Inserire un valore valido");
      return false;
    }
  });
    
  $("#search").blur(function() {
    if(this.value == ''){ 
      this.value = 'Search...';
    }
  });

  $("#login-name").blur(function() {
    if(this.value == ''){ 
      this.value = 'Nome';
    }
  });

  $("#login-surname").blur(function() {
    if(this.value == ''){ 
      this.value = 'Cognome';
    }
  });

  $("#login-mail").blur(function() {
    if(this.value == ''){ 
      this.value = 'E-mail';
    }
  });

  $("#search").focus(function() {
    if (this.value == 'Search...') {
      this.value = ''; 
    }
  });

  $("#login-name").focus(function() {
    if (this.value == 'Nome') {
    this.value = ''; 
    }
  });

  $("#login-surname").focus(function() {
    if (this.value == 'Cognome') {
      this.value = ''; 
    }
  });

  $("#login-mail").focus(function() {
    if (this.value == 'E-mail') {
        this.value = ''; 
    }
  });

  var manualNav = function(manual){
    slides.forEach((slide) => {
      slide.classList.remove('active');
      btns.forEach((btn) => {
        btn.classList.remove('active');
      });
    });
    slides[manual].classList.add('active');
    btns[manual].classList.add('active');
  }

  btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
      manualNav(i);
      currentSlide = i;
    });
  });

  var repeat = function(activeClass){
    let active = document.getElementsByClassName('active');
    let i = 1;
  
    var repeater = () => {
      setTimeout(function(){
        [...active].forEach((activeSlide) => {
          activeSlide.classList.remove('active');
        });
  
        slides[i].classList.add('active');
        btns[i].classList.add('active');
        i++;
  
        if(slides.length == i){
          i = 0;
        }
        if(i >= slides.length){
          return;
        }
        repeater();
      }, 10000);
    }
    repeater();
  }
  repeat();
});

