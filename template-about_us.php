<?php
/**
 * Template Name: About us
 * @package ths
 */


$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
if(count($alt)) echo $alt;

get_header(); ?>

<div class="grid">
	<article class="about_us">
		<div class="about_us__top">
			<div data-animate="slideInLeft"  class="about_us__top--text">
					<h2>To my <br> <span>Ania Mukowska i Marta Tomczyńska.</span></h2>
					<h3>Nazywamy się <b>AiM!</b></h3>
			</div>
			<div class="about_us__top--picture"  data-animate="slideInRight" >
				<img src="<?php asset('img/aboutus-main.png') ?>" alt="Ania i Marta">
			</div>	
		</div>
		</div>

		<div class="about_us__break">
			<h2 data-animate="slideInRight"><?php the_field('about_us_small_title'); ?></h2>
		</div>	
<div class="grid">
		<div class="about_us__bottom">
			<?php
				if( have_rows('about_us') ):
				while ( have_rows('about_us') ) : the_row(); 
			?>	
				<div class="single_person" data-animate="slideInLeft">
					<div class="single_person--img"><img src="<?php aImage('about_us_picture'); ?>" alt="<?php aAlt('about_us_picture'); ?>"></div>
						<h2 class="single_person--name"><?php echo the_sub_field('about_us_name'); ?></h2>
							<div class="single_person--description"><?php echo the_sub_field('about_us_description'); ?></div>
				</div>
			<?php endwhile; endif;?>
		</div>
	</article>
</div>
<?php get_footer(); ?>