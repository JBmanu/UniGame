function hideElement(element){
    element
            .removeClass("selected")
            .next().slideUp();
}

$(document).ready(function(){

    let bntsSeller = document.querySelectorAll('.accordion > button');
    let arrowExpanse = document.querySelectorAll('button > .expand_button');


    bntsSeller.forEach(el => {
        let indexArrow = 0;
        el.onclick = () => {
            console.log("cliccooo");

            if( arrowExpanse[indexArrow].style.transform == 'rotate(90deg)' ) {
                arrowExpanse[indexArrow].style.transform = 'rotate(0deg)';
            } else {
                arrowExpanse[indexArrow].style.transform = 'rotate(90deg)';
            }
            indexArrow += 1;
        }; 
    });

    $("button").click(function(){
        if($(this).hasClass("selected")){
            //bottone già cliccato, allora lo nascondo
            hideElement($(this));
        }
        else{
            //bottone non cliccato, nascondere eventualmente elemento precedentemente cliccato e visulizzare contenuto div che segue
            hideElement($("button.selected"));
            $(this).addClass("selected");
            $(this).next().slideDown();
        }
    });
});