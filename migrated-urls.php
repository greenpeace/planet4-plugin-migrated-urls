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
	$sql = 'SELECT meta.meta_value as p3_url , post.ID, post.post_title
			FROM `wp_postmeta` AS meta,  wp_posts AS post 
			WHERE meta_key = "p3_url"
			AND post.id=meta.post_id';

	global $wpdb;
	$results = $wpdb->get_results( $sql );
	//print_r($results);

	foreach ( $results as $result ) {
		echo $result->p3_url;
		echo ",";
		echo get_permalink( $result->ID );
		echo "<br>";

	}

}