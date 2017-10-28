<?php
/*
Plugin Name: Location "Is Sticky" for ACF
Plugin URI: 
Description: Add-On plugin for Advanced Custom Fields (ACF) PRO that adds an Is Sticky location for fields
Version: 1.0
Author: Aleksandr Beliaev
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: acf-location-sticky
Domain Path: /languages
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class acf_location_sticky_plugin
{
	/*
	*  Construct
	*
	*  @description:
	*  @since: 1.0
	*/

	function __construct()
	{
		//init the plugin core
		add_action( 'admin_init', array( $this, 'init' ), 1 );
		
	}
	
	
	/*
	*  Initialization
	*
	*  @description: includes add-on logic
	*  @since: 1.0
	*/
	function init()
	{
		
		if ( class_exists('acf')) {
			// defining new acf location -> "Post Stickiness"
			include_once( 'inc.php' );
		}
		
	}
	
	
}

new acf_location_sticky_plugin();
