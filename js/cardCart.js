$(document).ready(function(){

    let cntnBody = document.querySelector('body');
    let cntnrPay = document.querySelector('.cntnr_pay');
    let btnPay = document.querySelector('.cntnr_down_btn');
    let cntnrCard = document.querySelector('.cntnr_list_card');
    let cartlistCard = document.querySelectorAll('.card_composed');



    cartlistCard.forEach(el => {
        let btnLess = el.querySelector('.less_cmd_card_composed');
        let btnAdd = el.querySelector('.plus_cmd_card_composed');
        let quantity = el.querySelector('.quantity_card_composed');
        
        btnAdd.addEventListener('click', () => {
            quantity.innerHTML = parseInt(quantity.textContent) + 1;

            btnAdd.classList.remove('transform_btn_add_cart');
            void btnAdd.offsetWidth;
            btnAdd.classList.add('transform_btn_add_cart');
        });

        btnLess.addEventListener('click', () => {
            quantity.innerHTML = parseInt(quantity.textContent) - 1;

            if(parseInt(quantity.textContent) >= 1 ) {
                btnLess.classList.remove('transform_btn_less_cart');
                void btnLess.offsetWidth;
                btnLess.classList.add('transform_btn_less_cart');
            } else {
                el.animate({ transform: 'scale(0.2, 0.2)' }, 400);
                setTimeout(function () { el.remove() }, 350);
            }
        });
    });



    btnPay.addEventListener('click', () => {
        window.scrollTo(0,0);
        disableScroll();

        cntnBody.disabled = true;
        btnPay.disabled = true;

        cntnrCard.style.filter = 'blur(10px)';
        btnPay.style.filter = 'blur(10px)';
        document.querySelector('.container').style.filter = 'blur(10px)';
        document.querySelector('ul').style.filter = 'blur(10px)';
        document.querySelector('.navbar_info_menu').style.filter = 'blur(10px)';

        cntnrPay.style.display = 'flex';
    });

});