<?php
/**
 * Template Name: Offer
 * @package ths
 */

get_header(); ?>
	<section class="offer">
		<div class="offer__map_section--title">
			<h2 data-animate="slideInLeft">Znajdziesz nas w</h2>
			<h1 data-animate="slideInLeft">PUCKU</h1>
			<div data-animate="slideInRight" class="offer__map_section--title--contact">
				<h3><a target="_blank" href="<?php echo the_field('offer_quick_contact');?>">Napisz do nas</a></h3>
			</div>
		</div>



	<div class="offer__description_section">
		<div data-animate="slideInLeft" class="offer__description_section--first_box">
			<h1 class="offer__description_section--title"><?php echo the_field("offer_description_title2"); ?></h1>
				<div class="offer__description_section--offer_description">
					<?php echo the_field("offer_description"); ?>
				</div>
		</div>
		<div data-animate="slideInRight" class="offer__description_section--second_box">
			<h1 class="offer__description_section--title"><?php echo the_field("offer_description_title"); ?></h1>
				<div class="offer__description_section--offer_list">
					<ul>
						<?php
							if( have_rows('offer_description_list') ):
							while ( have_rows('offer_description_list') ) : the_row(); 
						?>	
							<li><?php echo the_sub_field("offer_list"); ?></li>
						<?php endwhile; endif;?>
					</ul>
				</div>
		</div>
	</div>
	</section>
	<div id="map"></div>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcRb8Hf3A9GfA3rNXPnSHOfRh5sKct6VM&callback=initMap" async defer></script>
<?php
get_footer();