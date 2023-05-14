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

// const modal = document.querySelector('.alert');

$('.modalBtnOpen').on('click', function (e){
    $('.alert').animate({top: '50px', opacity: '1'}, 500);
    $('.alert').removeClass('displayNone');
});
// alertClose
$('.alertClose').on('click', function (e){
    $('.alert').addClass('displayNone');
    $('.alert').css({"top":"0","opacity":"0"});

});
// LOGIN FORM BUTTON
$('.loginSubmitButton').on('click', function (e) {
    e.preventDefault();
    $(`input`).removeClass('errorfield');
    let login = $('input[name="login"]').val(),
    password = $('input[name="password"]').val();
    $('.alert').addClass('displayNone');
    $('.alert').css({"top":"0","opacity":"0"});
    if (!((login.length < 1) || (password.length < 1))){
        $.ajax({
            type: "POST",
            url: "../php/signin.php",
            data: {
                login: login,
                password: password
            },
            dataType: "json",
            success: function (data) {
                if (data.status){
                    // document.location.href= '../profile.php';
                    $('.alertBody').text('DA');
                    $('.alert').animate({top: '50px', opacity: '1'}, 500);
                    $('.alert').removeClass('displayNone');
                }else{
                    $('.alertBody').text(data.message);
                    $('.alert').animate({top: '50px', opacity: '1'}, 500);
                    $('.alert').removeClass('displayNone');
                }
                if (data.fields){
                    // .errorfield
                    data.fields.forEach(field => {
                    $(`input[name="${field}"]`).addClass('errorfield');
                    // $(`.${field}`).addClass('displayNone');
                    });
                }
            }
        });
    }else{
        $('.alertBody').text('Введите данные!');
        $('.alert').animate({top: '50px', opacity: '1'}, 500);
        $('.alert').removeClass('displayNone');
    }
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