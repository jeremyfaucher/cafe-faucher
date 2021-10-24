<?
/**
 * Manually enqueue Contact Form 7 plugin scripts (CSS & JS) for a WordPress website
 *
 * @author   Golden Oak Web Design <info@goldenoakwebdesign.com>
 * @license  https://www.gnu.org/licenses/gpl-2.0.html GPLv2+
 */
if( class_exists( 'WPCF7' ) ) {
  function manually_enqueue_wpcf7_scripts() {
    // Pages to add CF7 scripts
    $pages_cf7_add_scripts = array( 'contact' );

    if( is_page( $pages_cf7_add_scripts ) ) {
      if( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    } 
    if( function_exists( 'wpcf7_enqueue_styles' ) ) {
        wpcf7_enqueue_styles();
    }
}
}
  add_filter( 'wpcf7_load_js', '__return_false' ); // Disable CF7 JavaScript
  add_filter( 'wpcf7_load_css', '__return_false' ); // Disable CF7 CSS
  add_action( 'wp_enqueue_scripts', 'manually_enqueue_wpcf7_scripts' );
}