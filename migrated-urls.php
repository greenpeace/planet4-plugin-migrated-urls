<?php
/*
 * Plugin Name: Migrated p3 URLs
 * To be used temporarily to export p3 migrated content from p4
 * including old and new urls
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


add_action( 'admin_menu', 'migrated_urls_admin_view' );

function migrated_urls_admin_view() {
	add_menu_page( 'Migrated Urls Page', 'Migrated Urls', 'manage_options', 'migrated_urls', 'migrated_urls' );
}

function migrated_urls() {
	global $wpdb;

	$rd_args = array(
		'meta_key' => 'p3_url',
		'posts_per_page' => -1,
	);

	$rd_query = new WP_Query( $rd_args );

	foreach ( $rd_query->posts as $post ) {
		$p3_url = get_post_meta($post->ID, 'p3_url');
		echo $p3_url[0];
		echo ",";
		echo get_permalink( $post->ID );
		echo "<br>";

	}

}
