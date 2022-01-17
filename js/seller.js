function hideElement(element){
    element.removeClass("selected")
        .next().slideUp();
}

$(document).ready(function(){

    $("button").click(function(){


        if($(this).hasClass("selected")){
            //bottone già cliccato, allora lo nascondo
            hideElement($(this));

            $(this).children(".expand_button").css("transform", "rotate(0deg)");
            
            $(this).addClass("margin_bottom_medium");
        }
        else{
            //bottone non cliccato, nascondere eventualmente elemento precedentemente cliccato e visulizzare contenuto div che segue
            hideElement($("button.selected"));
            $(this).addClass("selected");
            $(this).next().slideDown();


            document.querySelectorAll('.expand_button').forEach(arrow => {
                arrow.style.transform = "rotate(0deg)";
            });
            $(this).children(".expand_button").css("transform", "rotate(90deg)");


            document.querySelectorAll('.cntnr_long_buttons').forEach(btn => {
                btn.classList.add('margin_bottom_medium');
            });
            $(this).removeClass("margin_bottom_medium");

        }
    });
});