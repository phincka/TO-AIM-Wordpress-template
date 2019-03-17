<?php
/**
 * Template Name: About us
 * @package ths
 */

get_header(); ?>




<section class="about_us">
	<div class="about_us__top">
		<div class="about_us__top--text">
			<h1>Cześć</h1>
				<h3>To my <br> <span>Ania Mukowska i Marta Tomczyńska.</span></h3>
				<h3>Nazywamy się <b>AIM!</b></h3>
		</div>
		<div class="about_us__top--picture">
			<img src="<?php asset('img/aboutus-main.png') ?>" alt="x">
		</div>	
	</div>
	<div class="about_us__break">
		<h2><?php the_field('about_us_small_title'); ?></h2>
	</div>	
	<div class="about_us__bottom">
		<?php
			if( have_rows('about_us') ):
			while ( have_rows('about_us') ) : the_row(); 
		?>	
			<div class="single_person">
				<div class="single_person--img"><img src="<?php echo the_sub_field('about_us_picture'); ?>" alt=""></div>
					<h2 class="single_person--name"><?php echo the_sub_field('about_us_name'); ?></h2>
						<div class="single_person--description chuj"><?php echo the_sub_field('about_us_description'); ?></div>
			</div>
		<?php endwhile; endif;?>

	</div>
</section>



<?php get_footer(); ?>