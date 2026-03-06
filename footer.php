<?php get_footerNavi(); ?>
<footer class="l-footer">
  <section class="l-footer__wrapcontent">
    <div class="l-footer__wrapcontent__title">
      <a href="/">
        <img class="l-footer__wrapcontent__title__img" src="<?php echo get_template_directory_uri(); ?>/images/svg/logo_w.svg" alt="下村特殊精工株式会社">
      </a>
    </div>
    <ul class="l-footer__wrapcontent__flex">
      <li class="l-footer__wrapcontent__flex__item"><a href="/recruit">リクルートTOP</a></li>
      <li class="l-footer__wrapcontent__flex__item"><a href="/recruit/aboutus/">会社を知る</a></li>
      <li class="l-footer__wrapcontent__flex__item"><a href="/recruit/environment/">働く環境を知る</a></li>
      <li class="l-footer__wrapcontent__flex__item"><a href="/recruit/ourwork/">仕事を知る</a></li>
      <li class="l-footer__wrapcontent__flex__item"><a href="/recruit/internship/">インターンシップ制度</a></li>
      <li class="l-footer__wrapcontent__flex__item"><a href="/recruit/outline/">募集要項</a></li>
      <li class="l-footer__wrapcontent__flex__item"><a href="/recruit/qa/">よくあるご質問</a></li>
    </ul>
    <div class="l-footer__youtubebox">
      <a href="https://www.youtube.com/watch?v=UKkD3GnF6og?autoplay=1&mute=1" class="l-footer__youtubebox__link popup-iframe">
        <span class="l-footer__youtubebox__link__img">
          <img src="<?php echo get_template_directory_uri(); ?>/images/svg/yooutube.svg" alt="会社紹介 MOVIE">
        </span>
        会社紹介 MOVIE
      </a>
    </div>
    <!-- footer-youtubebox -->
  </section>
  <div class="copylight">
    © Copyright by SHIMOMURA TOKUSHU SEIKO Co.,Ltd.
  </div>
</footer>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/common/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<script>
	$(function () {
	//ページ内スクロール処理
		var headerHeight = $('.l-header').outerHeight(); 
		$('a[href^="#"]').on('click', function (e) {
		var speed = 800;
		var href = $(this).attr("href");
		var $target = href === "#" || href === "" ? $('html') : $(href);
	
		if ($target.length) {
			var position = $target.offset().top - headerHeight;
			$('html, body').animate({ scrollTop: position }, speed, 'swing');
			e.preventDefault();
		}
		});
	});
</script>
 <?php if( is_page(array('contact','error'))): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/yubinbango.js" charset="UTF-8"></script>
  <script>
  document.querySelector('.mw_wp_form_input form').classList.add('h-adr');
  </script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>