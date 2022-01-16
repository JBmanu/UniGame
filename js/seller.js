function hideElement(element){
    element
            .removeClass("selected")
            .next().slideUp();
}

$(document).ready(function(){

    $("button").click(function(){
        if($(this).hasClass("selected")){
            //bottone già cliccato, allora lo nascondo
            hideElement($(this));
            $(this).children(".expand_button").css("transform", "rotate(0deg)");
        }
        else{
            //bottone non cliccato, nascondere eventualmente elemento precedentemente cliccato e visulizzare contenuto div che segue
            hideElement($("button.selected"));
            $(this).addClass("selected");
            $(this).next().slideDown();

            $(this).children(".expand_button").css("transform", "rotate(90deg)");
        }
    });
});