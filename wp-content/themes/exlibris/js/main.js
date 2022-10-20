//SLider blog page
$('.suggest-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrow:true,
    prevArrow:'<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="26"><image width="16" height="26" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAaCAQAAAAUYRSMAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfmAR8ODRJ1Wh5JAAABn0lEQVQoz2WST0tVURTFf/vcS4Oes7piIIhmQgMJEkt8A0WQF1KZEDiPjIZ9hPwYJUHTGoT6/Bs9MegFLyQIgkDFgYQI2UwdiLUanPvOudqe3MNda6+z9zrLrgMGCEOcqRIVlpPWc4A1v2184Jntpwq/imU9WrFObWrWEfo9UQAD+kwnDSvbT2dYgMzT7lvNLlHViA6EU2ECAZrinS5qhgmOwXBBFgNjmpckPOcJfzySWiAo5QWPOOUprwi7pR42VLK3jOmISRajKqS5QRkLusUv7tGIjsgrAFe1Qjc73GErgl7DGeqnbt1sMMgW+dJN+4xUN1ijhVV7qEMvqmgYIuUKLaANDinAsZJsmz3GGLJ2lpA13QzlwGaY4FiPbZaSgmlNkjMEVUY40F1qZP7m+AAuPzQos8Nt6nSdncEFsU3KfOUadfqKwXHhoWCfYd7TxrpVYsqSrKh3whs66GeSXfvmG3NCWO4vc1xgiHE7sU8ASev/gazxmwqjZKyi5HLMcaR84TvjDNLLfLjiXPh/8NEecJO9MGTsz0+7VBGv/wGO0oohFMo6kwAAAABJRU5ErkJggg=="/></svg></button>',
    nextArrow:'<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="29"><path stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" d="m2.576 25.635 12.916-11.517L2.576 2.601"/></svg></button>',
    responsive: [
      {
        breakpoint: 1290,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 970,
        settings: {
          slidesToShow: 1,
        }
      },
    ]
  });

$(document).ready(function () {
    $('.lang-list a').click(function () {
        window.location.href = $(this).attr('href');
    });
});




if($('.how-help-sect__phone-slider')){
    $('.how-help-sect__red-box').removeClass('center-red-box');
}
if(!$('.how-help-sect__phone-slider')){
    $('.how-help-sect__red-box').addClass('center-red-box');
}






//Contact


window.addEventListener('message', event => {
    if(event.data.type === 'hsFormCallback' && event.data.eventName === 'onFormSubmitted') {
        $('body').addClass('form-sended');
    }
 });






//Sub menu


const btnSubMenu = document.querySelectorAll('header .header__bottom_right ul li.menu-item-has-children')
const linkMenu = document.querySelectorAll('header .header__bottom_right ul li.menu-item-has-children a');


if($( window ).width() < 991){
    $(linkMenu).on('click', function (e) {
        e.stopPropagation();
    });
    
    
    
    
    $(btnSubMenu).each(function () {
        $(this).on('click', function () {
            $(this).find('.sub-menu').slideToggle();
            $(this).toggleClass('active');
            $(this).find('a').css('text-shadow', 'none');
        });
    });
}else{
    $(btnSubMenu).each(function () {
        $(this).off('click', function () {
            $(this).find('.sub-menu').slideToggle();
            $(this).toggleClass('active');
            $(this).find('a').css('text-shadow', 'none');
        });
    });
}









const buttonsHelpYou = document.querySelectorAll('.help-you__btn');



buttonsHelpYou.forEach((btn,index) => {
    btn.addEventListener('click', (e) => {
        unAtiveBnt();
        activeBnt(index);
    });
});

function activeBnt(i) {
        buttonsHelpYou[i].classList.add('active');
}
activeBnt(0);

function unAtiveBnt() {
    buttonsHelpYou.forEach(item => {
        item.classList.remove('active');
    });
}












