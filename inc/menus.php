<?php
/**
 * Infinity Theme: menus
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2012 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage base
 * @since 1.1
 */

/**
 * Add a filter for every displayed user navigation item
 */
function infinity_bp_nav_inject_options_setup()
{
	global $bp;

	// loop all nav components
	foreach ( (array)$bp->bp_nav as $user_nav_item ) {
		// add navigation filter
		add_filter(
			'bp_get_displayed_user_nav_' . $user_nav_item['css_id'],
			'infinity_bp_nav_inject_options_filter',
			999,
			2
		);
	}
}

/**
 * Inject options nav onto end of active displayed user nav component
 *
 * @param string $html
 * @param array $user_nav_item
 * @return string
 */
function infinity_bp_nav_inject_options_filter( $html, $user_nav_item )
{
	// slug of nav item being filtered
	$component = $user_nav_item[ 'slug' ];
	
	// show options nav?
	$show = bp_is_current_component( $component );
	
	// special hack to handle profile in BP versions < 1.7
	if (
		'profile' == $component &&
		-1 == version_compare( BP_VERSION, '1.7') &&
		false == bp_is_my_profile()
	) {
		// force hide it
		$show = false;
	}

	// filter the show var because i love developers
	$show = (boolean) apply_filters( 'infinity_bp_nav_inject_options_show', $show, $user_nav_item );

	// ok, finally... should we show it?
	if ( true === $show ) {

		// yes, need to capture options nav output
		ob_start();

		// run options nav template tag
		bp_get_options_nav();

		// grab buffer and wipe it
		$nav = trim( (string) ob_get_clean() );

		// make sure the result has some meat
		if ( '' != $nav ) {
			// yep, inject options nav onto end of list item wrapped in special <ul>
			return preg_replace(
				'/(<\/li>.*)$/',
				'<ul class="profile-subnav">' . $nav . '</ul>$1',
				$html,
				1
			);
		}
	}

	// no changes
	return $html;
}
