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
                    data.fields.forEach(field => {
                    $(`input[name="${field}"]`).addClass('errorfield');
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
//REGISTER FORM BUTTON
$('.registerSubmitButton').on('click', function (e) {
    e.preventDefault();
    $('.alert').addClass('displayNone');
    $('.alert').css({"top":"0","opacity":"0"});
    $(`input`).removeClass('errorfield');
    let login = $('input[name="login"]').val(),
    mail = $('input[name="mail"]').val(),
    password = $('input[name="password"]').val(),
    password_reply = $('input[name="password_reply"]').val(),
    name = $('input[name="name"]').val(),
    surname = $('input[name="surname"]').val(),
    patronymic = $('input[name="patronymic"]').val(),
    rules = $('.checkboxRules').is(':checked');
    // if ($('.checkboxRules').is(':checked')){
        // if (login.length > 1 && mail.length > 1 && password > 1 && password_reply > 1 && name.length > 1 && surname.length > 1 && patronymic.length > 1){
        $.ajax({
            type: "POST",
            url: "../php/signup.php",
            data: {
                login: login,
                password: password,
                password_reply: password_reply,
                mail: mail,
                name: name,
                surname: surname,
                patronymic: patronymic,
                rules: rules
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
                    data.fields.forEach(field => {
                    $(`input[name="${field}"]`).addClass('errorfield');
                    });
                }
            }
        });
        // }else{
        //     $('.alertBody').text('Введите все значения!');
        //     $('.alert').animate({top: '50px', opacity: '1'}, 500);
        //     $('.alert').removeClass('displayNone'); 
        // }
    // }else{
    //     $('.alertBody').text('Вы не согласились с правилами!');
    //     $('.alert').animate({top: '50px', opacity: '1'}, 500);
    //     $('.alert').removeClass('displayNone'); 
    // }

    // if (preg_match('~[\\\/:*?"\'<>|]~', $str))
    // echo 'Alert';



    // if (!((login.length < 1) || (password.length < 1))){
    //     $.ajax({
    //         type: "POST",
    //         url: "../php/signin.php",
    //         data: {
    //             login: login,
    //             password: password
    //         },
    //         dataType: "json",
    //         success: function (data) {
    //             if (data.status){
    //                 // document.location.href= '../profile.php';
    //                 $('.alertBody').text('DA');
    //                 $('.alert').animate({top: '50px', opacity: '1'}, 500);
    //                 $('.alert').removeClass('displayNone');
    //             }else{
    //                 $('.alertBody').text(data.message);
    //                 $('.alert').animate({top: '50px', opacity: '1'}, 500);
    //                 $('.alert').removeClass('displayNone');
    //             }
    //             if (data.fields){
    //                 data.fields.forEach(field => {
    //                 $(`input[name="${field}"]`).addClass('errorfield');
    //                 });
    //             }
    //         }
    //     });
    // }else{
    //     $('.alertBody').text('Введите данные!');
    //     $('.alert').animate({top: '50px', opacity: '1'}, 500);
    //     $('.alert').removeClass('displayNone');
    // }
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