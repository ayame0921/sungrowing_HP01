$(function() {
  $('.hamburger').click(function() {
      $(this).toggleClass('active');

      if ($(this).hasClass('active')) {
          $('.globalMenuSp').addClass('active');
      } else {
          $('.globalMenuSp').removeClass('active');
      } 
    
  });
});
//メニュー内を閉じておく
$(function() {
  $('.globalMenuSp a[href]').click(function() {
      $('.globalMenuSp').removeClass('active');
     $('.hamburger').removeClass('active');

  });
});

$(function(){
	AOS.init();
	var showTriggerY = $('.topNav').height();
	var fixedHeader = $('#headerFixed');
	var scrollTimer = null
  	var scrollTop = 0
	$(window).on('scroll', function() {
    clearTimeout(scrollTimer);

    scrollTimer = setTimeout(function() {
      scrollTop = $(this).scrollTop();
      if (scrollTop < showTriggerY) {
        fixedHeader.removeClass('headerShow');
      } else {
        fixedHeader.addClass('headerShow');
      }
    }, 100)
  })
});
$(function(){
  AOS.init({
    offset: 300,
    duration: 800,
  });
});

$(function () {
  /*=================================================
  スクロール時のイベント
  ===================================================*/
  $(window).scroll(function () {
    // スクロール位置を取得
    let scroll = $(window).scrollTop();

    /*=================================================
    メインビジュアルの拡大・縮小
    ===================================================*/
    mv_scale(scroll);

  });

});

/*=================================================
メインビジュアルの拡大・縮小（共通処理）
===================================================*/
function mv_scale(scroll) {
  // window.innerWidthで画面幅を取得
  // PC表示の場合の処理（画面幅が900pxより大きい場合　※900pxはCSSのブレークポイントとあわせる）
  if (window.innerWidth > 900) {
    // メインビジュアルのCSS（width）を変更する
    // widthの値をスクロール量にあわせて増やすことで画像を拡大させる
    $("#mainvisual img").css({
      width: scroll / 22.6 + "%",
      height: 770 + "px",
    });
    // スマホ表示の場合の処理（画面幅が900px以下の場合）
  } else {
    // メインビジュアルのCSS（width）を変更する
    // widthの値をスクロール量にあわせて減らすことで画像を縮小させる
    $("#mainvisual img").css({
      width: 180 - scroll / 50 + "%",
      height: 250 + "px",
    });
  }
  if (window.innerWidth > 900) {
    // メインビジュアルのCSS（width）を変更する
    // widthの値をスクロール量にあわせて増やすことで画像を拡大させる
    $("#mainvisual2 img").css({
      width: scroll / 50 + "%",
    });
    // スマホ表示の場合の処理（画面幅が900px以下の場合）
  } else {
    // メインビジュアルのCSS（width）を変更する
    // widthの値をスクロール量にあわせて減らすことで画像を縮小させる
    $("#mainvisual2 img").css({
      width: 250 - scroll / 50 + "%",
    });
  }
  if (window.innerWidth > 900) {
    // メインビジュアルのCSS（width）を変更する
    // widthの値をスクロール量にあわせて増やすことで画像を拡大させる
    $("#mainvisual3 img").css({
      width: 100 + scroll / 22.6 + "%",
      height: 770 + "px",
    });
    // スマホ表示の場合の処理（画面幅が900px以下の場合）
  } else {
    // メインビジュアルのCSS（width）を変更する
    // widthの値をスクロール量にあわせて減らすことで画像を縮小させる
    $("#mainvisual3 img").css({
      width: 180 - scroll / 50 + "%",
      height: 250 + "px",
    });
  }
  if (window.innerWidth > 900) {
    // メインビジュアルのCSS（width）を変更する
    // widthの値をスクロール量にあわせて増やすことで画像を拡大させる
    $("#mainvisual4").css({
      width: 100 + scroll / 22.6 + "%",
    });
    // スマホ表示の場合の処理（画面幅が900px以下の場合）
  } else {
    // メインビジュアルのCSS（width）を変更する
    // widthの値をスクロール量にあわせて減らすことで画像を縮小させる
    $("#mainvisual4").css({
      width: 180 - scroll / 50 + "%",
    });
  }
}