
$(document).ready(function() {
    $(window).scroll(function() {
        if($(this).scrollTop()){
            $('nav').addClass('scroll')
        }else{
            $('nav').removeClass('scroll')
        }
        // hover img
        $("#loading-wrap").fadeOut(5000, function(){ 
            $("#loading-wrap").remove();
        })
            $("#wrap").fadeIn(1000); 
        })
        $(function () {
            $("div.trangphuc").hover(function () {
                // mouse over
                $(this).find(".inf").stop().animate({ bottom: '0', opacity: 1 });
            }, function () {
                // mouse out
                $(this).find(".inf").stop().animate({ bottom: '-100%', opacity: 0 });
            });
        })
})

$(document).ready(function(){
    $(window).scroll(function(event){
        var pos_body = $('html,body').scrollTop();
        var pos_qc = $('.qc').offset().top;
        var pos_sp = $('.sanpham').offset().top;
        // console.log(pos_body);
        // console.log(pos_qc);
        // console.log(pos_sp);

        // button comeback
        if(pos_body > 1200){
            $('.return').addClass('show');
        }else{
            $('.return').removeClass('show');
        }

        // animate
        // animate SP
        if(pos_body > pos_sp - 400){
            $('.trangphuc').addClass('flipInX animated');
        }else{
            $('.trangphuc').removeClass('flipInX animated');
        }
        // animate QC
        if(pos_body > pos_qc - 600){
            $('.qc-item1').addClass('bounceInLeft animated 3s');
            $('.qc-item2').addClass('bounceInDown animated 3s');
            $('.qc-item3').addClass('bounceInRight animated 3s');
        }else{
            $('.qc-item1').removeClass('bounceInLeft animated');
            $('.qc-item2').removeClass('bounceInDown animated');
            $('.qc-item3').removeClass('bounceInRight animated');
        }
    });
        $('.return').click(function(evnet){
            $('html,body').animate({scrollTop: 0},2000);
    })
})
