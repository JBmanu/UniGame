function turn(){
    let listCard = document.querySelectorAll('.card_simple');
    listCard.forEach(element => {
        let face1 = element.querySelector('.front_card_flip');
        let face2 = element.querySelector('.back_card_flip');
        face2.classList.remove('flipped_back');
        face1.classList.remove('flipped_front');
    });
}

function msgAja() {

}

$(document).ready(function(){
    let listCard = document.querySelectorAll('.card_simple');

    listCard.forEach(element => {
        let btnAdd = element.querySelector('.btn_overlay_bottom_right');
        let btnWish = element.querySelector('.btn_overlay_bottom_left');
        let btnSubmit = element.querySelector('.btn_submit_card')
        let face1 = element.querySelector('.front_card_flip');
        let face2 = element.querySelector('.back_card_flip');


        if(btnWish != null) {

            btnWish.addEventListener('click', () => {
                let src = btnWish.getAttribute('src');
                
                if (src == '../img/item/heart-empty.svg') {
                    btnWish.src = '../img/item/heart-full.svg';
                    btnWish.classList.toggle('transform_heart');
                }
                else if (src == '../img/item/heart-full.svg') {
                    btnWish.src = '../img/item/heart-empty.svg';
                    btnWish.classList.remove('transform_heart');
                }
                
                else if (src == '../../img/item/heart-empty.svg') {
                    btnWish.src = '../../img/item/heart-full.svg';
                    btnWish.classList.toggle('transform_heart');
                }
                else if (src == '../../img/item/heart-full.svg') {
                    btnWish.src = '../../img/item/heart-empty.svg';
                    btnWish.classList.remove('transform_heart');
                }
                
                let data = {idGame:element.id, favourite:"click", action:"like"};

                $.ajax({
                    url:"http://localhost/UniGame/manager/evetItem.php",
                    method: "post",
                    data: data,
                    success: function(res) {
                        window.location.reload();
                        console.log(res);
                    }
                });
                window.location.reload();
            });
        }


        if(btnAdd != null) {
            btnAdd.addEventListener('click', () => {
                turn();
                face1.classList.toggle('flipped_front');
                face2.classList.toggle('flipped_back');
            });
        }

        if(btnSubmit != null) {
            btnSubmit.addEventListener('click', () => {

                face2.classList.toggle('flipped_back');
                face2.style.display = 'none !important';

                face1.classList.toggle('flipped_front');
                element.classList.add('transform_card');
                void element.offsetWidth;
                element.classList.remove('transform_card');
            });
        }

    });
});
