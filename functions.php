<?php
/**
 *
 * @package ths
 */

/**
 * Disable fucking gutenberg
 */
add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
/**
 * Add custom thumbnails size
 */
add_action('after_setup_theme', 'wpdocs_theme_setup');
function wpdocs_theme_setup()
{
    add_image_size('fullhd', 1920, 1080, true);
}

/**
 * Reguster post types
 *
 * @return void
 */
function postTypes()
{
    register_post_type('ciekawostki', postTypeArgs('Ciekawostki', 'Ciekawostki'));
}
add_action('init', 'postTypes', 0);

/**
 * Register menus and locations
 */
register_nav_menus(array(
    'header' => 'Główne',
    'footer' => 'Stopka'
));

/**
 * Include scripts and styles
 */
function thesigner_scripts()
{
    wp_enqueue_style('app', get_template_directory_uri() . '/dist/css/app.css', true, '1.0', 'all');

    wp_enqueue_script('libjs', get_template_directory_uri() . '/dist/js/lib.js', '', '1.0', true);
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/dist/js/app.js', '', '1.0', true);
}
add_action('wp_footer', 'thesigner_scripts');

/**
 * Return args of cpt
 *
 * @param String $plural name
 * @param String $singular name
 * @return void
 */
function postTypeArgs($plural, $singular)
{
    $labels = array(
        'name' => _x(ucfirst($plural) , ucfirst($plural) , 'thesigner') ,
        'singular_name' => _x(ucfirst($singular) , ucfirst($singular) , 'thesigner')
    );
    $args = array(
        'label' => __(ucfirst($singular) , 'thesigner') ,
        'labels' => $labels,
        'supports' => array(
            'title'
        ) ,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 3,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'taxonomies' => array(
            'category_' . strtolower($singular)
        )
    );
    return $args;
}

/**
 * Add thumbnail support
 */
add_theme_support('post-thumbnails');

/**
 * Register menus and locations
 */
register_nav_menus(array(
    'header' => 'Główne',
    'footer' => 'Stopka'
));

/**
 * Outputs the url of ACF image object
 * Usage: aImage('field', 'null/size')
 * @param String $field
 * @param String $type
 *
 * @return String
 */
function aImage($field, $size = null)
{

    $image = get_field($field);
    if (!$image)
    {
        $image = get_sub_field($field);
    }

    if ($size != null)
    {
        $img = $image['sizes'][$size];
    }
    else
    {
        $img = $image['url'];
    }
    echo ($img) ? $img : $image['url'];
}

/**
 * Outputs the alt of ACF image object
 * Usage: aAlt('field', 'null/type')
 * @param String $field
 *
 * @return String
 */
function aAlt($field)
{
    $image = get_field($field);
    if (!$image)
    {
        $image = get_sub_field($field);
    }

    $alt = $image['alt'];
    echo $alt;
}

/**
 * Check if the post is older than $days
 * @param String
 *
 * @return Integer $days
 */
function isOld($days)
{
    $days = (int)$days;
    $offset = $days * 60 * 60 * 24;
    return (get_post_time() < date('U') - $offset) ? true : false;
}

/**
 * Returns the String of the asset in dist folder
 * @param String asset
 *
 * @return String url
 */
function asset($asset)
{
    echo get_template_directory_uri() . '/dist/' . $asset;
}

/**
 * Inject inline SVG
 * @param String name
 *
 * @return String HTML
 */
function svg($asset)
{
    $getOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false
        )
    );
    echo file_get_contents(get_template_directory_uri() . '/dist/img/' . $asset, false, stream_context_create($getOptions));
}

add_filter('body_class', 'change_body_class');
function change_body_class($classes) {
	if (stripos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false && stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false) {
		$classes[] = 'safari';
	}
	return $classes;
}

/**
 * Remove wp version
 */
remove_action('wp_head', 'wp_generator');

/**
 * Add mime types support
 */
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Remove default woocommerce styles
 */
// add_filter('woocommerce_enqueue_styles', '__return_empty_array');



/**
 * Remove CF7 styles
 *
 * @return void
 */
function thesigner_deregister_styles()
{
    wp_deregister_style('contact-form-7');
}
add_action('wp_print_styles', 'thesigner_deregister_styles', 100);

/**
 * Disable jQuery from frontend
 * You might wanna turn it on if you're using third party sketchy JS
 */
function isa_remove_jquery_migrate($scripts)
{
    if (!is_admin())
    {
        $scripts->remove('jquery');
    }
}
add_filter('wp_default_scripts', 'isa_remove_jquery_migrate');

/**
 * Remove wordpress stuff that we dont need
 */
function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
remove_action('wp_head', 'wp_resource_hints', 2);
add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins))
    {
        return array_diff($plugins, array(
            'wpemoji'
        ));
    }
    else
    {
        return array();
    }
}
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type)
    {
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, array(
            $emoji_svg_url
        ));
    }
    return $urls;
}

/**
 * Add options page
 *//*
if (function_exists('acf_add_options_page'))
{
    acf_add_options_page(array(
        'page_title' => 'Ogólne',
        'menu_title' => 'Ogólne',
        'redirect' => false
    ));
}

/**
 * Register default ACF fields
 * responsible for displaying title and description inputs (for seo)
 */
if (function_exists('acf_add_local_field_group')):
    acf_add_local_field_group(array(
        'key' => 'group_5b728f125850c',
        'title' => 'Seo',
        'fields' => array(
            array(
                'key' => 'field_5b728f2c041fc',
                'label' => 'Title',
                'name' => 'title-seo',
                'type' => 'text',
                'instructions' => 'Wpisz tytuł seo (ok. 60 znaków)'
            ) ,
            array(
                'key' => 'field_5b728f5a12993',
                'label' => 'Description',
                'name' => 'description-seo',
                'type' => 'text',
                'instructions' => 'Wpisz opis seo (ok. 170 znaków)'
            )
        ) ,
        'location' => array(
            array(
                array(
                    'param' => 'post_status',
                    'operator' => '!=',
                    'value' => 'trash'
                )
            )
        ) ,
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1
    ));
endif;

/**
 * Minify HTML output
 */
function compressHTML($str)
{
    return preg_replace(array(
        '/<!--(.*?)-->/s', // html comments
        '@\/\*(.*?)\*\/@s', // js comments
        '/\>[^\S ]+/s', // after ">"
        '/[^\S ]+\</s', // beofre ">"
        '/\>\s+\</', // between "><"
        '/\;[^\S ]+/s', // after ;
        '/\{[^\S ]+/s', // before {
        '/\}[^\S ]+/s', // before {
        '/[^\S ]+\}/s'
        // after }
        
    ) , array(
        '', /// html comments
        '', // js comments
        '>', // after ">"
        '<', // strips before tags, except space
        '><', // between "><"
        ';', // after ;
        '{', // before {
        '}', // before }
        '}'
        // after }
        
    ) , $str);
}

add_action('template_redirect', 'htmlStart', 0);
function htmlStart()
{
    ob_start('compress');
}

add_action('shutdown', 'htmlEnd', 1000);
function htmlEnd()
{
    ob_end_flush();
}

/**
 * Output the buffer
 */
function compress($buffer)
{
    return compressHTML($buffer);
}

/** 
* Disable fucking  post editor
*/
function reset_editor()
{
     global $_wp_post_type_features;
     $post_type="page";
     $feature = "editor";
     if ( !isset($_wp_post_type_features[$post_type]) )
     {
     }
     elseif ( isset($_wp_post_type_features[$post_type][$feature]) )
     unset($_wp_post_type_features[$post_type][$feature]);
}
add_action("init","reset_editor");

/**
 *
 * Google Maps 
 * 
 **/


add_action('acf/init', 'my_acf_init');


function wpa_widgets_init() {
    register_sidebars(1, array(
     'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<h3 class="sidebar__widget-title">',
     'after_title' => '</h3>')
    );
  }
    add_action( 'widgets_init', 'wpa_widgets_init' );

    