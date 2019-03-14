<?php
/**
 * Template Name: About us
 * @package ths
 */

get_header(); ?>



<h1>O NAS</h1>

	<?php
		if( have_rows('about_us') ):
		while ( have_rows('about_us') ) : the_row(); 
	?>	
		<div class="products_section__single">
			<div class="product_img"><img src="<?php echo the_sub_field('about_us_picture'); ?>" alt=""></div>
				<h2><?php echo the_sub_field('about_us_name'); ?></h2>
					<div class="products_section__break"></div>
						<p><?php echo the_sub_field('about_us_description'); ?></p>
		</div>
	<?php endwhile; endif;?>

<?php get_footer(); ?>