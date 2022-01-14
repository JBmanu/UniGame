$(document).ready(function(){

  //Controlla il menu dell'header delle pagine
  $(".icon").click(function(){      
    let x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
    x.className = "topnav";
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
});

