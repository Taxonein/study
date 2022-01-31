$(document).ready(function () {
    $('.menubut').click(function(){
        $(".mbar").toggle("slow");
    });
    var vinny=2032;
    var leo=567;
    var kesha=193;
    $('.vote1').click(function(){
        vinny= vinny+1;
    });
    $('.vote2').click(function(){
        leo= leo+1;
    });
    $('.vote3').click(function(){
        kesha= kesha+1;
    });
    $('.chsel').change(function(){
        values= $('.chsel :selected').val();
        switch(values){
            case '0':
                $('span.heroname').text('?');
                $('span.herovote').text('?');
                $('.imgvote').attr('src','img/image.png');
                break;
            case '1':
                $('span.heroname').text('Винни-Пух');
                $('span.herovote').text(vinny);
                $('.imgvote').attr('src','img/1.png');
                break;
            case '2':
                $('span.heroname').text('Леопольд');
                $('span.herovote').text(leo);
                $('.imgvote').attr('src','img/2.png');
                break;
            case '3':
                $('span.heroname').text('Кеша');
                $('span.herovote').text(kesha);
                $('.imgvote').attr('src','img/3.png');
                break;
            case '4':
                $('span.heroname').text('Волк');
                $('span.herovote').text('18');
                $('.imgvote').attr('src','img/4.png');
                break;s
        }
    });
});