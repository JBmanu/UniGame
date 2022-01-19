function hideElement(element){
    element.removeClass("selected")
        .next().slideUp();
}

$(document).ready(function(){

    $("main > section > section").click(function(){
        if($(this).hasClass("selected")){
            //bottone già cliccato, allora lo nascondo
            hideElement($(this));
           
            $(this).children(".expand_button").css("transform", "rotate(0deg)");
        }
        else{
            //bottone non cliccato, nascondere eventualmente elemento precedentemente cliccato e visulizzare contenuto div che segue
            hideElement($("section.selected"));
            $(this).addClass("selected");
            $(this).next().slideDown();
            

            document.querySelectorAll('.expand_button').forEach(arrow => {
                arrow.style.transform = "rotate(0deg)";
                console.log("prova");
            });
            $(this).children(".expand_button").css("transform", "rotate(90deg)");
        }
    });
});