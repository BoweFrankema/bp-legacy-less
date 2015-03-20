<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.0.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function ssbp_enqueue_scripts() {
  // Load our base CSS
  wp_enqueue_style('bp_styles',  plugins_url( '../templates/css/buddypress-min.css', __FILE__ ), false, '483a77c0a2f2029c4bb29bef1fe3962b');

  //Register custom JS
  wp_register_script('bp_scripts', plugins_url( '../templates/js/buddypress-min.js', __FILE__ ), array(), 'e4584ac0e1ebcc61d4f3909c2b590fd2', true);
  wp_enqueue_script('bp_scripts');
}
add_action('wp_enqueue_scripts', 'ssbp_enqueue_scripts', 100);

