
var listCard = document.querySelectorAll('.card_simple');

listCard.forEach(element => {
    var btnAdd = element.querySelector('.btn_overlay_bottom_right');
    var btnWish = element.querySelector('.btn_overlay_bottom_left');
    var btnSubmit = element.querySelector('.btn_submit_card')
    var face1 = element.querySelector('.front_card_flip');
    var face2 = element.querySelector('.back_card_flip');

   
    btnWish.addEventListener('click', () => {
        if (btnWish.src.match("../img/item/heart-empty.svg")) {
            btnWish.src = '../img/item/heart-full.svg';
            btnWish.classList.toggle('transform_heart');
        } 
        else {
            btnWish.src = '../img/item/heart-empty.svg';
            btnWish.classList.remove('transform_heart');
        }
    });


    btnAdd.addEventListener('click', () => {
        face1.classList.toggle('flipped_front');
        face2.classList.toggle('flipped_back');
    });

    btnSubmit.addEventListener('click', () => {
        face2.classList.toggle('flipped_back');
        face1.classList.toggle('flipped_front');
        element.classList.add('transform_card');
        void element.offsetWidth;
        element.classList.remove('transform_card');
    });

});


var price = document.querySelector('.cntnr_order_price');
var left = document.querySelector('.bar_obj_left');

left.addEventListener('click', () => {  
    if (price.style.display === 'block') {
        price.style.display = 'none';
    } else {
        price.style.display = 'block';
    }
});



