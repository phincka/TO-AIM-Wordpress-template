<?php
/**
 * Template Name: Contact
 * @package ths
 */
get_header(); ?>
<div class="grid">
    <article class="contact_section">
        <h1 data-animate="slideInLeft"><?php echo the_field('contact_title'); ?></h1>
            <div class="contact_section__description">
                <div class="contact_section__description--text">
                    <div data-animate="fadeIn"><?php echo the_field('contact_description'); ?></div>
                    <address class="contact_section__contact_list">
                        <h2 data-animate="slideInRight"><?php echo the_field('contact_forms_title') ?></h2>
                            <?php
                                if( have_rows('contact_forms') ):
                                    while ( have_rows('contact_forms') ) : the_row();
                                        if( get_row_layout() == 'email' ):
                            ?>
                                        <div data-animate="slideInLeft" class="contact_section__contact_list--single">
                                            <img src="<?php aImage('contact_type_icon'); ?>" alt="<?php aAlt('contact_type_icon'); ?>">
                                            <a target="_blank" href="mailto:<?php echo the_sub_field('contact_mail'); ?>"><?php echo the_sub_field('contact_name'); ?></a>
                                        </div>
                                        <?php elseif( get_row_layout() == 'telephone' ): ?>
                                            <div data-animate="slideInLeft" class="contact_section__contact_list--single">
                                                <img src="<?php aImage('contact_type_icon'); ?>" alt="<?php aAlt('contact_type_icon'); ?>">
                                                <a target="_blank" href="tel:<?php echo the_sub_field('contact_phone_number'); ?>"><?php echo the_sub_field('contact_name'); ?></a>
                                            </div>
                                        <?php elseif( get_row_layout() == 'link' ): ?>
                                            <div data-animate="slideInLeft" class="contact_section__contact_list--single">
                                                <img src="<?php aImage('contact_type_icon'); ?>" alt="<?php aAlt('contact_type_icon'); ?>">
                                                <a target="_blank" href="<?php echo the_sub_field('contact_link'); ?>"><?php echo the_sub_field('contact_name'); ?></a>
                                            </div>
                                        <?php endif; endwhile; else : endif; ?>
                    </address>
                </div>
                </div>
            </div>
    </article>
</div>
<?php get_footer(); 