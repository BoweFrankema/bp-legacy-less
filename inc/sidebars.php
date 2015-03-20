<?php
/**
 * Infinity Theme: sidebars
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage base
 * @since 1.0
 */

/**
 * Registers our widget sidebars.
 *
 * Hooked to 'widgets_init'.
 *
 * @package Infinity
 * @subpackage base
 * @uses current_theme_supports()
 * @uses infinity_base_register_sidebars()
 * @uses infinity_base_register_bp_sidebars()
 */
function infinity_base_widgets_setup()
{
	// sidebars enabled?
		// yep, register base sidebars
		infinity_base_register_sidebars();
		// BuddyPress sidebars enabled?
		if ( function_exists( 'bp_is_member' ) ) {
		// yep, register BP sidebars
		infinity_base_register_bp_sidebars();
		}
}
add_action( 'widgets_init', 'infinity_base_widgets_setup' );

/**
 * Register one sidebar
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @package Infinity
 * @subpackage base
 * @see register_sidebar()
 * @param string $id Sidebar ID, 'id' arg passed to register_sidebar()
 * @param string $name Sidebar name, 'name' arg passed to register_sidebar()
 * @param string $desc Sedebar description, 'description' arg passed to register_sidebar()
 */
function infinity_base_register_sidebar( $id, $name, $desc )
{
	register_sidebar( array(
		'id' => $id,
		'name' => $name,
		'description' => $desc,
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h4
		>',
		'after_title' => '</h4>'
	));
}

/**
 * Register base sidebars
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_base_register_sidebars()
{
	// Global
	infinity_base_register_sidebar(
		'sitewide-sidebar',
		'Sitewide Sidebar',
		'Sitewide widget area'
	);
	// page
	infinity_base_register_sidebar(
		'home-sidebar',
		'Home Sidebar',
		'The home widget area'
	);
	// blog
	infinity_base_register_sidebar(
		'blog-sidebar',
		'Blog Sidebar',
		'The blog widget area'
	);
	// page
	infinity_base_register_sidebar(
		'page-sidebar',
		'Page Sidebar',
		'The page widget area'
	);
}

/**
 * Register BuddyPress sidebars
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_base_register_bp_sidebars()
{
	// activity sidebar
	infinity_base_register_sidebar(
		'activity-sidebar',
		'Activity Sidebar',
		'The Activity widget area'
	);
	// member sidebar
	infinity_base_register_sidebar(
		'member-sidebar',
		'Member Sidebar',
		'The Members widget area'
	);
	// blogs sidebar
	infinity_base_register_sidebar(
		'blogs-sidebar',
		'Blogs Sidebar',
		'The Blogs Sidebar area'
	);
	// groups sidebar
	infinity_base_register_sidebar(
		'groups-sidebar',
		'Groups Sidebar',
		'The Groups widget area'
	);
	// forums sidebar
	infinity_base_register_sidebar(
		'forums-sidebar',
		'Forums Sidebar',
		'The Forums widget area'
	);
}

/**
 * Show one sidebar
 *
 * @package Infinity
 * @subpackage base
 * @param $index Sidebar index (slug) to display
 * @param $admin_text Text for header above link to widgets manager
 * @return boolean Returns true if sidebar is active and was loaded
 */
function infinity_base_sidebar( $index, $admin_text )
{
	// check if its active
	if ( is_active_sidebar( $index ) ) {
		// yep spit it out
		dynamic_sidebar( $index );
		// sidebar was loaded
		return true;
	// can current user monkey with widgets?
	} elseif ( current_user_can( 'edit_theme_options' ) ) {
		// yep, spit out a nice link ?>
	<?php
	}

	// sidebar not loaded
	return false;
}

/**
 * Show sidebars based on page type (including BP components)
 *
 * @package Infinity
 * @subpackage base
 */
function infinity_base_sidebars()
{

		// show global sidebar (always try to load this one)
		infinity_base_sidebar( 'sitewide-sidebar', 'Sitewide Sidebar' );

	if ( function_exists( 'bp_is_member' ) ) {
		// any profile page, or any members component page?
		if ( bp_is_user() || bp_is_current_component( 'members' ) ) {

			// show member sidebar
			return infinity_base_sidebar( 'member-sidebar', 'BP Member Sidebar' );

		// any groups component page, except member groups?
		} elseif ( !bp_is_user() && bp_is_current_component( 'groups' ) ) {

			// show groups sidebar
			return infinity_base_sidebar( 'groups-sidebar', 'BP Group Sidebar' );

		// any forums component page, except profile pages?
		} elseif ( !bp_is_user() && bp_is_current_component( 'forums' ) ) {

			// show forums sidebar
			return infinity_base_sidebar( 'forums-sidebar', 'BP Forums Sidebar' );

		// any blogs component page, except member blogs?
		} elseif ( !bp_is_user() && bp_is_current_component( 'blogs' )) {

			// show blogs sidebar
			return infinity_base_sidebar( 'blogs-sidebar', 'BP Blogs Sidebar' );

		// any activity component page, except member activity?
		} elseif ( !bp_is_user() && bp_is_current_component( 'activity' ) ) {

			// show activity sidebar
			return infinity_base_sidebar( 'activity-sidebar', 'Activity Sidebar' );
		}
	}
	// if a BP sidebar was output, this function
	// would have been exited by this point!!!

	// front page?
	if ( is_page() && is_front_page() ) {

		// show home sidebar
		return infinity_base_sidebar( 'home-sidebar', 'Home Sidebar' );

	} elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) {

		// show forums sidebar
		return infinity_base_sidebar( 'forums-sidebar', 'Forums Sidebar' );

	// any other page?
	} elseif ( is_page() ) {

		// show page sidebar
		return infinity_base_sidebar( 'page-sidebar', 'Page Sidebar' );

	// assume its the "blog" (posts)
	} else {

		// show blog sidebar
		return infinity_base_sidebar( 'blog-sidebar', 'Blog Sidebar' );
	}

	// only showed global sidebar
	return true;

}
