var cntnrScroll = document.querySelector('.cntnr_scroll_horizontal_item');

var itemInScroll = document.querySelectorAll('.cntnr_item_scroll');
var topPos = itemInScroll.offsetTop;

cntnrScroll.scrollTop = itemInScroll.offsetTop;;

var posArray = itemInScroll.positionedOffset();
cntnrScroll.scrollTop = posArray[1];


// window.addEventListener('load', () => {
//   self.setInterval(() => {
//     scrollCntnr.scrollIntoView(true);

//     if (scrollCntnr.scrollLeft !== flavoursScrollWidth) {
//         scrollCntnr.scrollTo(scrollCntnr.scrollLeft + 1, 0);
//         console.log("entroooo\n");      
//     }
//   }, 15);
// });