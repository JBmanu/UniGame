
var listCard = document.querySelectorAll('.card_simple');
var cartlistCard = document.querySelectorAll('.card_composed');

listCard.forEach(element => {
    var btnAdd = element.querySelector('.btn_overlay_bottom_right');
    var btnWish = element.querySelector('.btn_overlay_bottom_left');
    var btnSubmit = element.querySelector('.btn_submit_card')
    var face1 = element.querySelector('.front_card_flip');
    var face2 = element.querySelector('.back_card_flip');

   
    btnWish.addEventListener('click', () => {
        if (btnWish.src.match("../img/itemBar/heart-empty.svg")) {
            btnWish.src = '../img/itemBar/heart-full.svg';
            btnWish.classList.toggle('transform_heart');
        } 
        else {
            btnWish.src = '../img/itemBar/heart-empty.svg';
            btnWish.classList.remove('transform_heart');
        }
    });


    btnAdd.addEventListener('click', () => {
        face1.classList.toggle('flipped_front');
        face2.classList.toggle('flipped_back');
        element.classList.remove('transform_card');
    });

    btnSubmit.addEventListener('click', () => {
        face2.classList.toggle('flipped_back');
        face1.classList.toggle('flipped_front');
        element.classList.add('transform_card');
        void element.offsetWidth;
    });

});


cartlistCard.forEach(el => {
    var btnLess = el.querySelector('.less_cmd_card_composed');
    var btnAdd = el.querySelector('.plus_cmd_card_composed');
    var quantity = el.querySelector('.quantity_card_composed');
    
    btnAdd.addEventListener('click', () => {
        quantity.innerHTML = parseInt(quantity.textContent) + 1;
        btnAdd.classList.remove('transform_btn_add_cart');
        void btnAdd.offsetWidth;
        btnAdd.classList.add('transform_btn_add_cart');
    });


    btnLess.addEventListener('click', () => {
        quantity.innerHTML = parseInt(quantity.textContent) - 1;

        if(parseInt(quantity.textContent) < 1 ) {
            el.animate({ transform: 'scale(0.2, 0.2)' }, 400);
            setTimeout(function () { el.remove() }, 350);
        }
    });

});

var btnPay = document.querySelector('.cntnr_down_btn');
var cntnBody = document.querySelector('body');
var cntnrCard = document.querySelector('.cntnr_list_card');

btnPay.addEventListener('click', () => {
    console.log('sto cliccanndo');
    window.scrollTo(0,0);
    disableScroll();

    cntnBody.disabled = true;
    btnPay.disabled = true;

    cntnrCard.style.filter = 'blur(10px)';
    btnPay.style.filter = 'blur(10px)';
    
    cntnBody.innerHTML += StaticFactoryObj.createCntnrMathodPay();

});


