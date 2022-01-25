function filterByMinMax(items, min, max) { 
    items.forEach(item => {
        let price = item.querySelector('.btn_overlay_top_right').innerHTML.replace('€', '');
        let cost = parseFloat(price);
        
        if(cost < min || cost > max) {
            item.style.display = "none";
        } else {
            item.style.display = "flex";
        }
    });
}


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
        let items = document.querySelectorAll('.card_simple');
        let limit = selectFilter.value.split('to');

        console.log(selectFilter.value);

        if(selectFilter.value == "all"){
            items.forEach(item => item.style.display = "flex");
        } else {
            filterByMinMax(items, parseFloat(limit[0]), parseFloat(limit[1]));
        }
    });
    
});
