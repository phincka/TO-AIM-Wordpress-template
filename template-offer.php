<?php
/**
 * Template Name: Offer
 * @package ths
 */

get_header(); ?>

<h1>OFERTA</h1>
					<?php
					if( have_rows('offer') ):
						while ( have_rows('offer') ) : the_row(); 
					?>	
						<div class="products_section__single">
							<div class="product_img"><img src="<?php echo the_sub_field('offer_picture'); ?>" alt=""></div>
								<h2><?php echo the_sub_field('offer_title'); ?></h2>
									<div class="products_section__break"></div>
										<p><?php echo the_sub_field('about_us_descriptions'); ?></p>
						</div>
					<?php endwhile; endif;?>

<?php
get_footer();