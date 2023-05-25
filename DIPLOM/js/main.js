//LOGIN FORM SUBMIT
$('.loginFormSubmit').on('click', function (e) {
    e.preventDefault();
    let login = $('input[name="login"]').val(),
    password = $('input[name="password"]').val();
    $('.loadGif').removeClass('displayNone');
    $('.formMsg').addClass('displayNone');
    if (!((login.length == 0) || (password.length == 0))){
        $.ajax({
            type: "POST",
            url: "../user/signin.php",
            data: {
                login: login,
                password: password
            },
            dataType: "json",
            success: function (data) {
                if (data.status){
                    document.location.href= '../user/profile.php';
                }else{
                    $('.formMsg').removeClass('displayNone').text(data.message);
                    $('.loadGif').addClass('displayNone');
                }
            }
        });
    }else{
        $('.formMsg').removeClass('displayNone').text('Введите данные');
        $('.loadGif').addClass('displayNone');
    }
});
// REGISTER FORM SUBMIT
$('.registerSubmitButton').on('click', function (e) {
    e.preventDefault();
    let fullname = $('input[name="fullname"]').val(),
    login = $('input[name="login"]').val();
    password = $('input[name="password"]').val();
    password_reply = $('input[name="password_reply"]').val();
    email = $('input[name="email"]').val();
    $('.loadGif').removeClass('displayNone');
    $('.formMsg').addClass('displayNone');
    $.ajax({
        type: "POST",
        url: "../user/signup.php",
        data: {
            fullname: fullname,
            login: login,
            password: password,
            password_reply: password_reply,
            email: email
        },
        dataType: "json",
        success: function (data) {
            if (data.status){
                document.location.href= '../user/profile.php';
                $('.formMsg').removeClass('displayNone').text(data.message);
                $('.loadGif').addClass('displayNone');
            }else{
                $('.formMsg').removeClass('displayNone').text(data.message);
                $('.loadGif').addClass('displayNone');
            }
        }
    });
});
//ADD TO CART SUBMIT
$('.addToCart').on('click', function (e) {
    e.preventDefault();
    $('.loadGif').removeClass('displayNone');
    $('.formMsg').addClass('displayNone');
    let id = $('input[name="id"]').val()
    $.ajax({
        type: "POST",
        url: "cart_add.php",
        data: {
            id: id
        },
        dataType: "json",
        success: function (data) {
            $('.formMsg').removeClass('displayNone').text(data.message);
            $('.loadGif').addClass('displayNone');
        }
    });    
});
// CART MINUS
$('.CartItemButtonMinus').on('click', function (e) {
    e.preventDefault();
    $('.formMsg').addClass('displayNone');
    let id = $(this).data('id')
    $.ajax({
        type: "POST",
        url: "../user/functions.php",
        data: {
            id: id,
            action: 1
        },
        dataType: "json",
        success: function (data) {
            if (data.status){
                window.location.href= '../user/cart.php';
                location.reload();
            }else{
                $('.formMsg').removeClass('displayNone').text(data.message);
            }
        }
    });    
});

// CART PLUS
$('.CartItemButtonPlus').on('click', function (e) {
    e.preventDefault();
    $('.formMsg').addClass('displayNone');
    let id = $(this).data('id')
    $.ajax({
        type: "POST",
        url: "../user/functions.php",
        data: {
            id: id,
            action: 2
        },
        dataType: "json",
        success: function (data) {
            if (data.status ){
                window.location.href= '../user/cart.php';
                location.reload();
            }else{
                $('.formMsg').removeClass('displayNone').text(data.message);
            }
        }
    });    
});
// CART DELETE
$('.deleteFromCart').on('click', function (e) {
    e.preventDefault();
    $('.formMsg').addClass('displayNone');
    let id = $(this).data('id')
    $.ajax({
        type: "POST",
        url: "../user/functions.php",
        data: {
            id: id,
            action: 3
        },
        dataType: "json",
        success: function (data) {
            if (data.status ){
                window.location.href= '../user/cart.php';
                location.reload();
            }else{
                $('.formMsg').removeClass('displayNone').text(data.message);
            }
        }
    });    
});
// CART ORDER
$('.cartTotalOrder').on('click', function (e) {
    e.preventDefault();
    $('.formMsg').addClass('displayNone');
    $('.loadGif').removeClass('displayNone');
    $.ajax({
        type: "POST",
        url: "../user/order.php",
        data: {
        },
        dataType: "json",
        success: function (data) {
            if (data.status){
                window.location.href= '../user/cart.php';
                location.reload();
            }
            $('.loadGif').addClass('displayNone');
            $('.formMsg').removeClass('displayNone').text(data.message);
        }
    });    
});
$('.catalogDiv').click(function(){ 
    $(".catalog").css("opacity", "0");
    $(".catalog").css("top", "0");
    if($(".catalog").css("display") == "none"){
        $(".catalog").css("display", "flex");
        $(".catalog").animate({'opacity':'1'},10);
        $(".catalog").animate({'top':'40px'},15);
    } 
    else{
        $(".catalog").css("display", "none");
    }
});

$('.menuwrap').click(function(){ 
    $(".menuDiv").css("opacity", "0");
    $(".menuDiv").css("top", "0");
    if($(".menuDiv").css("display") == "none"){
        $(".menuDiv").css("display", "flex");
        $(".menuDiv").animate({'opacity':'1'},10);
        $(".menuDiv").animate({'top':'40px'},15);
    } 
    else{
        $(".menuDiv").css("display", "none");
    }
});
$(document).mouseup(function (e){ // событие клика по веб-документу
    var div = $(".menuDiv");
    var div = $(".menuwrap"); // тут указываем ID элемента
    if (!div.is(e.target) && div.is(e.target)   // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
            div.hide(); // скрываем его
    }
  });


  $(document).mouseup(function (e){ // событие клика по веб-документу
    var div = $(".catalog"); // тут указываем ID элемента
    if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
      div.hide(); // скрываем его
    }
  });


