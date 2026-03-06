// JavaScript Document
$(window).on('load resize', function() {
  $('.js-globalnavlinkArrow').off();
  $('.js-footernavlinkArrow').off();
if (window.matchMedia('(max-width:1023px)').matches) {
  // SPの処理
      $('.js-globalnavlinkArrow').on('click', function(){
          $(this).parent().next('.l-globalnav__child').toggleClass('open').slideToggle(300);
          $(this).toggleClass('open');
          if ($(this).next('.l-globalnav__child').hasClass('open')) {
            //open表示中の場合
            $(this).next('.l-globalnav__child').css('display', '');
          } else {
            //open非表示の場合

          }
       });
      if ($('.js-navSwitch').hasClass("is-open")) {
        //open表示中の場合

      } else {
        //open非表示の場合

      }   
      $('.js-footernavlinkArrow').on('click', function(){
          $(this).parent().next('.l-footernav__child').toggleClass('open').slideToggle(300);
          $(this).toggleClass('open');
          if ($(this).next('.l-footernav__child').hasClass('open')) {
            //open表示中の場合
            $(this).next('.l-footernav__child').css('display', '');
          } else {
            //open非表示の場合
            
          }
       });

} else if (window.matchMedia('(min-width:1024px)').matches) {
  // PCの処理
      var ua = navigator.userAgent;
      if (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
        // スマートフォン用コード
          $('.js-globalnavlinkArrow').on('click', function(){
          $(this).parent().next('.l-globalnav__child').toggleClass('open').slideToggle(300);
          $(this).toggleClass('open');
          if ($(this).next('.l-globalnav__child').hasClass('open')) {
            //open表示中の場合
            $(this).next('.l-globalnav__child').css('display', '');
          } else {
            //open非表示の場合

          }
          });
          if ($('.js-navSwitch').hasClass("is-open")) {
            //open表示中の場合

          } else {
            //open非表示の場合
          }

      } else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) {
        // タブレット用コード
          $('.js-globalnavlinkArrow').on('click', function(){
          $(this).parent().next('.l-globalnav__child').toggleClass('open').slideToggle(300);
          $(this).toggleClass('open');
          if ($(this).next('.l-globalnav__child').hasClass('open')) {
            //open表示中の場合
            $(this).next('.l-globalnav__child').css('display', '');
          } else {
            //open非表示の場合

          }
          });
          if ($('.js-navSwitch').hasClass("is-open")) {
            //open表示中の場合

          } else {
            //open非表示の場合
            
          }
          
      } else {
        // PC用コード      
          if ($('.js-navSwitch').hasClass("is-open")) {
            //open表示中の場合
          } else {
            //open非表示の場合
          }
      }
}
});

jQuery(function($){
  var scrollPos;//グローバルで初期かしておかないと上にもどっちゃう
  $('.js-navSwitch').on('click', function() {
      $('.js-globalNav').toggleClass('is-open').slideToggle(500);
      $('.js-navSwitch').toggleClass('is-open');
      if ($(".js-navText").text() === 'close') {
        $(".js-navText").text('MENU');
      } else {
        $(".js-navText").text('close');
      }
      if($('body').hasClass('fixed')){
          $('body').removeClass('fixed').css('top',0 + 'px');
          window.scrollTo( 0 , scrollPos );//初期化
          $('.animate-right').removeClass('fixed');
          $('.animate-bottom').removeClass('fixed');
          $('.animate-left').removeClass('fixed');
          $('.animate-fade').removeClass('fixed');
      }else{
          scrollPos = $(window).scrollTop();//現在のスクロール位置
          $('body').addClass('fixed').css('top',-scrollPos + 'px');
          $('.animate-right').addClass('fixed');
          $('.animate-bottom').addClass('fixed');
          $('.animate-left').addClass('fixed');
          $('.animate-fade').addClass('fixed');
      }
  });
});

//object-fit cover
objectFitImages();


//ScrollReveal
window.sr=ScrollReveal(),
  sr.reveal(".animate-right",{origin:"right",duration:1500,reset:false,easing:"ease-in-out",viewFactor:.3,distance:"20%",opacity:0,scale:1}),
  sr.reveal(".animate-bottom",{origin:"bottom",duration:1500,reset:false,easing:"ease-in-out",viewFactor:.3,distance:"20%",opacity:0,scale:1}),
  sr.reveal(".animate-left",{origin:"left",duration:1500,reset:false,easing:"ease-in-out",viewFactor:0,distance:"20%",opacity:0,scale:1}),
  sr.reveal(".animate-fade",{origin:"left",duration:1500,reset:false,easing:"ease-in-out",viewFactor:.3,distance:"0",opacity:0,scale:1})


//local-nav
$('#local-nav').clone().addClass('clone-local-nav').appendTo('main');
var pathname = location.href.split('/');
var pathnameLast = pathname[pathname.length - 2];
$('#local-nav a').each(function(){
  var $href = $(this).attr('href').split('/');
  var $hrefLast = $href[$href.length - 2];
  if(pathnameLast.match($hrefLast)) {
      $(this).addClass('active');
  }
});