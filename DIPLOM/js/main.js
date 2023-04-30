$('.loginFormSubmit').on('click', function (e) {
    e.preventDefault();
    console.log('test');
});




// $('.catalogDiv').click(function(){ 
//     $(".catalog").css("opacity", "0");
//     $(".catalog").css("top", "0");
//     if($(".catalog").css("display") == "none"){
//         $(".catalog").css("display", "flex");
//         $(".catalog").animate({'opacity':'1'},10);
//         $(".catalog").animate({'top':'40px'},15);
//     } 
//     else{
//         $(".catalog").css("display", "none");
//     }
// });
// $('.menuwrap').click(function(){ 
//     $(".menuDiv").css("opacity", "0");
//     $(".menuDiv").css("top", "0");
//     if($(".menuDiv").css("display") == "none"){
//         $(".menuDiv").css("display", "flex");
//         $(".menuDiv").animate({'opacity':'1'},10);
//         $(".menuDiv").animate({'top':'40px'},15);
//     } 
//     else{
//         $(".menuDiv").css("display", "none");
//     }
// });
// $(document).mouseup(function (e){ // событие клика по веб-документу
//     var div = $(".menuDiv"); // тут указываем ID элемента
//     if (!div.is(e.target) // если клик был не по нашему блоку
//         && div.has(e.target).length === 0) { // и не по его дочерним элементам
//       div.hide(); // скрываем его
//     }
//   });
//   $(document).mouseup(function (e){ // событие клика по веб-документу
//     var div = $(".catalog"); // тут указываем ID элемента
//     if (!div.is(e.target) // если клик был не по нашему блоку
//         && div.has(e.target).length === 0) { // и не по его дочерним элементам
//       div.hide(); // скрываем его
//     }
//   });
