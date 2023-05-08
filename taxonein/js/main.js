let slider = 0;
$('.sliderPrev').on('click', function (e) {
    if (window.screen.width >= 910){
        if (slider == 0){
            slider = -900;
        }else{
            slider = slider + 300;
        }
    }
    if (window.screen.width <= 909){
        if (slider == 0){
            slider = -800;
        }else{
            slider = slider + 200;
        }
    }
    $('.sliderLine').css('left',slider);
});
$('.sliderNext').on('click', function (e) {
    if (window.screen.width >= 910){
        if (slider == -900){
            slider = 0;
        }else{
            slider = slider - 300;
        }
    }
    if (window.screen.width <= 909){
        if (slider == -800){
            slider = 0;
        }else{
            slider = slider - 200;
        }
    }
    $('.sliderLine').css('left',slider);
});


const modal = document.querySelector('.modal');

$('.modalBtnOpen').on('click', function (e){
    modal.showModal();
});

// modalBtnClose
$('.modalBtnClose').on('click', function (e){
    dialog.close("test");
});
// const confirmBtn = document.querySelector('.modal');

// $('.testmodal').click (function () {
//     $('.modal').showModal();
//     // confirmBtn.showModal();
// });

// const favDialog = document.getElementsByClassName('modal');
// const modal = $('.modal');

// $('.testmodal').onclick = () => {
//     favDialog.showModal();
//     console.log('1');
// };
// const btnOpen = document.querySelector("#btn-open");
// const btnClose = document.querySelector("#btn-close")
// const modal = document.querySelector("#modal");

// btnOpen.onclick = () => {
//   modal.showModal()
// }


// btnClose.onclick = () => {
//     modal.close()
//   }