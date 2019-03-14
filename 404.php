<?php
get_header(); ?>
<section class="grid error-404" style="text-align:center;padding:100px 0;">
	<h2>Ta strona nie istnieje</h2>
	<a class="button" href="<?php echo get_home_url() ?>">Przejdź na stronę główną</a>
</section>
<style>
	.error-404 {
		width: 100%;
		height: 50vh;
		font-size: 2rem;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		-ms-flex-pack: center;
		justify-content: center;
		-ms-flex-direction: column;
		flex-direction: column;
	}
</style>
<?php
get_footer();