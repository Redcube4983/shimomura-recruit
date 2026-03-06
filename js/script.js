// JavaScript Document
$(document).ready(function(){
	//スクロール :not(.menuBtn)
	$('.menuBtn').click(function() {
		$('.navi-content').toggleClass('open');
		$('.Btn-navi').toggleClass('open');
		$('.navi-background').toggleClass('close');
		return false;
	});
	$('.navi-background').click(function() {
		$('.navi-content').toggleClass('open');
		$('.Btn-navi').toggleClass('open');
		$('.navi-background').toggleClass('close');
		return false;
	});

	//ボタン単品の話//
	$('.menuBtn').click(function() {
		$('.menu').toggleClass('open');
		$('.navi-background').toggleClass('open');
		$('#navicover').toggleClass('view');
		$('.navi-content').toggleClass('close');
		$('.Btn-navi').toggleClass('close');
		return false;
	});
	//ボタン単品の話//
	
	$('#navicover').click(function() {
		$('.menu').toggleClass('open');
		$('.navi-background').toggleClass('open');
		$('#navicover').toggleClass('view');
		$('.navi-content').toggleClass('close');
		return false;
	});

	//ボタン以外の場所をクリックしてもの話//
	$('.navi-background').click(function() {
		$('.menu').toggleClass('open');
		$('.navi-background').toggleClass('open');
		$('#navicover').toggleClass('view');
		$('.navi-content').toggleClass('close');
		$('.Btn-navi').toggleClass('close');
		return false;
	});
	//ボタン以外の場所をクリックしてもの話//


});


$(function() {
	$(".qa__list__item .qa__list__item__title").on("click", function() {
	$(this).toggleClass('open');
	$(this).next().toggleClass('open');
	});
});



$(function(){
    //クリックされたら
    $(".qa__list__item .qa__list__item__title").on("click",function(){
        //中身をスライドさせながら表示非表示
        $(this).next().slideToggle(500);
    });//end click
});//end function



$(document).ready(function() {
	var height = $('.fixedtrigger').offset().top - 150;
	$(window).on("scroll", function() {
	  if ($(this).scrollTop() > height ) {
		$("body").addClass('scroll__block');
	  } else {
		$("body").removeClass('scroll__block');
	  }
	});
});


$(document).ready(function() {
	var height = $('.fixedtrigger').offset().top;
	$(window).on("scroll", function() {
	  if ($(this).scrollTop() > height ) {
		$("body.scroll__block").addClass('scroll__b');
	  } else {
		$("body.scroll__block").removeClass('scroll__b');
	  }
	});
});

$(document).ready(function() {
	var height = $('.fixedtrigger').offset().top;
	$(window).on("scroll", function() {
	  if ($(this).scrollTop() > height ) {
		$("body.scroll__block").removeClass('scroll__c');
	  } else {
		$("body.scroll__block").addClass('scroll__c');
	  }
	});
});

/*
$(document).ready(function() {
	var height = $('.fixedtrigger').offset().top - 150;
	$(window).on("scroll", function() {
	  if ($(this).scrollTop() > height ) {
		$("body").addClass('scroll__c');
	  } else {
		$("body").removeClass('scroll__c');
	  }
	});
});
*/




/*
$(document).ready(function() {
	var height = $('.fixedtrigger').offset().top + 150;
	$(window).on("scroll", function() {
	  if ($(this).scrollTop() > height ) {
		$("body.scroll__block").removeClass('scroll__c');
	  } else {
		$("body.scroll__block").addClass('scroll__c');
	  }
	});
});
*/

/*
$(document).ready(function() {
	var height = $('.fixedtrigger').offset().top - 200;
	$(window).on("scroll", function() {
	  if ($(this).scrollTop() > height ) {
	  } else {
		$("body.scroll__c").removeClass('scroll__c');
	  }
	});
});
*/






  
$(function(){
	$('.popup-iframe').magnificPopup({
	  type: 'iframe',
	  disableOn: 500, //ウィンドウ幅が500px以下だったらモーダル表示させずにリンク先へ遷移
	  mainClass: 'mfp-fade',
	  removalDelay: 200,
	  preloader: false,
	  fixedContentPos: false
	});
  });



