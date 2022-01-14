$(document).ready(function(){
  var coll = document.getElementsByClassName("cntnr_long_buttons");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.getElementsByClassName("content")[0];
      var expand_button = this.getElementsByClassName("expand_button")[0];


      if(expand_button.style.transform == ""){
          expand_button.style.transform="rotate(0.25turn)";
      }else{
          expand_button.style.transform="";
      }
      

      if (content.style.maxHeight){
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      } 
    });
  }
});