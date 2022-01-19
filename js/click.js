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
});

