$(document).ready(function(){
    let btnBack = document.querySelector("#back");
    let btnCart = document.querySelector("#cart");
    let topCard = document.querySelector('.ctnr_top_card');

    btnBack.addEventListener('click', () => {
        btnBack.classList.remove('transform_btn_back');
        void btnBack.offsetWidth;
        btnBack.classList.add('transform_btn_back');
    });

    btnCart.addEventListener('click', () => {
        
        topCard.classList.remove('transform_top_card');
        void topCard.offsetWidth;
        topCard.classList.add('transform_top_card');
    });
});