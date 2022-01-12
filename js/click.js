$(document).ready(function(){

  var slides = document.querySelectorAll('.slide');
  var btns = document.querySelectorAll('.btn');
  let currentSlide = 1;

  //Controlla il menu dell'header delle pagine
  $(".icon").click(function(){      
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
    x.className = "topnav";
    }
  });

  //Controlla il search, che il campo sia diverso da vuoto
  $("#submit").click(function() {
    if ($("#search").val() === "Search") {
      alert("Inserire un valore valido");
      return false;
    }
  });
  

  //Se il campo è vuoto riscrive Nome nel form registrazione
  $("#login-name").blur(function() {
    if(this.value == ''){ 
      this.value = 'Nome';
    }
  });

  //Se il campo è vuoto riscrive Cognome nel form registrazione
  $("#login-surname").blur(function() {
    if(this.value == ''){ 
      this.value = 'Cognome';
    }
  });

  //Quando si clicca su search, toglie la parola Search
  $("#search").focus(function() {
    if (this.value == 'Search...') {
      this.value = ''; 
    }
  });

  //Quando si clicca su Nome nel form registrazione, toglie la parola Nome
  $("#login-name").focus(function() {
    if (this.value == 'Nome') {
    this.value = ''; 
    }
  });

    //Quando si clicca su Cognome nel form registrazione, toglie la parola Cognome
  $("#login-surname").focus(function() {
    if (this.value == 'Cognome') {
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

