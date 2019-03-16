</main>
<footer class="footer">
	<div class="footer__branding"><img src="<?php asset('img/aim-logo-white.png') ?>"></div>
	<nav class="footer__nav" role="navigation">
		<?php wp_nav_menu(['theme_location' => 'footer', 'container' => false]); ?>
	</nav>
	<div class="footer__contact">
		<a target="_blank" href="https://m.me/234378590575958"><img src="<?php asset('img/facebook-icon.png'); ?>"></a>
		<a href="mailto:toaim@wp.pl"><img src="<?php asset('img/mail-icon.png'); ?>"></a>
	</div>
	<div class="footer__author">
		©<a target="_blank" href="https://www.facebook.com/hinczykk"> Paweł Hincka </a>2018 | Design <a target="_blank" href="https://www.autor.pl"> Jan Szweda</a>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>	