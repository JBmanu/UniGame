$(document).ready(function(){
    let selectOrder = document.querySelector("#order");

    $.fn.reverseChildren = function() {
        return this.each(function(){
          var $this = $(this);
          $this.children().each(function(){ $this.prepend(this) });
        });
      };

    selectOrder.addEventListener("change", () => {
        $('.cntnr_list_card').reverseChildren();
    });

    // let selectFilter = document.querySelector("#filter");
    // let filter = true;

    // selectFilter.addEventListener("change", () => {
    //     console.log("change select");
    //     cres = !cres;
    //     document.querySelector(".cntnr_list_card").style.flexDirection = 
    //         cres ? 'row' : 'row-reverse';
    // });
    

    


});
