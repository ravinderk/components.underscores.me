<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package components
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 *
 * @since components 1.0
 */
function components_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'components_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function components_jetpack_setup
add_action( 'after_setup_theme', 'components_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 *
 * @since components 1.0
 */
function components_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function components_infinite_scroll_render

/**
 * Add support for the Site Logo
 *
 * @since components 1.0
 */
function components_site_logo_init() {
	add_image_size( 'components-logo', 200, 200 );
	add_theme_support( 'site-logo', array( 'size' => 'components-logo' ) );
}
add_action( 'after_setup_theme', 'components_site_logo_init' );

/**
 * Return early if Site Logo is not available.
 *
 * @since components 1.0
 */
function components_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}

/**
* Add theme support for Responsive Videos.
 *
 * @since components 1.0
*/
add_theme_support( 'jetpack-responsive-videos' );

