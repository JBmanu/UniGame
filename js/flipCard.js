var listCard = document.querySelectorAll('.card_simple');


listCard.forEach(element => {
    var btnAdd = element.querySelector('.btn_overlay_bottom_right');
    var btnWish = element.querySelector('.btn_overlay_bottom_left');
    var face1 = element.querySelector('.front_card_flip');
    var face2 = element.querySelector('.back_card_flip');

   
    btnWish.addEventListener('click', () => {

        if (btnWish.src.match("../img/itemBar/heart-empty.svg")) {
            btnWish.src = '../img/itemBar/heart-full.svg';
            btnWish.classList.toggle('transfor_heart');
        } 
        else {
            btnWish.src = '../img/itemBar/heart-empty.svg';
            btnWish.classList.remove('transfor_heart');
        }
    });


    btnAdd.addEventListener('click', () => {
        face1.classList.toggle('flipped_front');
        face2.classList.toggle('flipped_back');
    });

});

