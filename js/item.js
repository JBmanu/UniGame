$(document).ready(function(){
    let btnBack = document.querySelector(".btn_item_back");
    let btnCart = document.querySelector(".btn_submit_item");
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