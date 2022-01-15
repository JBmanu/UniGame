
$(document).ready(function(){

    let cntnrTaking = document.querySelector('.tracking_cntnr');

    let btnOpenTaking = document.querySelector('.button_tracking');
    let btnCloseTraking = document.querySelector('.button_exit_tracking');
    
    btnOpenTaking.style.transformOrigin = '0 0';

    btnOpenTaking.addEventListener('click', () => {
        cntnrTaking.animate({ transform: 'scale(1, 1)' }, 400);
        setTimeout(function () { cntnrTaking.style.transform = 'scale(1, 1)' }, 350);
    });

    btnCloseTraking.addEventListener('click', () => {
        cntnrTaking.animate({ transform: 'scale(1, 0.0)' }, 400);
        setTimeout(function () { cntnrTaking.style.transform = 'scale(1, 0.0)' }, 350);
    });

});