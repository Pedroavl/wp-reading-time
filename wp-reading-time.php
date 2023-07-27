<?php
/**
 * Plugin Name: WP Reading Time
 * Plugin URI: https://pedroavelar.com.br
 * Description: Um pluguin simples para adicionar tempo de leitura aos posts dos seus blogs usando o shortcode [wp-reading-time]
 * Version: 0.0.1
 * Author: Pedro Avelar
 * Author URI: https://pedroavelar.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wp-reading-time
 * Domain Path: /languages/
 *
 * @package wp reading time
 * @category Core
 * @author Pedro Avelar
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//estimated reading time
if(!function_exists('wp_reading_time')) {
  /*
   * Exibe um shortcode com o tempo de leitura [wp-reading-time]
  */
  add_shortcode( 'wp-reading-time', 'wp_reading_time' );
  
  function wp_reading_time() {
    $wp_content = get_post_field( 'post_content', $post->ID );
    $wp_word_count = str_word_count( strip_tags( $wp_content ) );
    $wp_readingtime = ceil($wp_word_count / 200);
    
    if ($wp_readingtime == 1) {
        $wp_timer = " minuto";
    } else {
        $wp_timer = " minutos";
    }
    
    $wp_total_reading_time = $wp_readingtime . $wp_timer;
    
    return $wp_total_reading_time;
  }
}
