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


    let selectFilter = document.querySelector("#formFilter");

    selectFilter.addEventListener("change", () => {

        if(selectFilter.value == "all"){
            console.log("tutti");
        }

        if(selectFilter.value == "10to50"){
            console.log("10to50");

        }

        if(selectFilter.value == "50to100"){
            console.log("50to100");

        }


    });
    

    


});
