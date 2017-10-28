<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class acf_location_sticky extends acf_location
{
	/*
	*  Construct
	*
	*  @description:
	*  @since: 1.0
	*/

	function __construct() {
		
		add_filter( 'acf/location/rule_match/post_stickiness', array( $this, 'acf_add_location_rule_post_stickiness_function' ), 1, 3 );
		add_filter( 'acf/location/rule_types', array( $this, 'acf_add_location_post_stickiness_rule' ), 1, 1 );
		add_filter( 'acf/location/rule_values/post_stickiness', array( $this, 'acf_add_location_rule_values' ), 1, 1 );
		
		// add_action('acf/field_group/admin_head', array( $this, 'admin_head' ), 0, 0 );
		
	}


	function acf_add_location_post_stickiness_rule($choices) {
	  $choices['Post']['post_stickiness'] = __('Post Stickiness','acf-location-sticky');
	  return $choices;
	}


	function acf_add_location_rule_values($choices) {
	  // Copied from acf/core/controllers/field_group.php
	  // @see http://bit.ly/1Xnx44g
	  
	  $choices = array(
	    'sticky' => __( 'Sticky', 'acf-location-sticky'),
	    'not_sticky' => __( 'Not sticky', 'acf-location-sticky'),
	  );
	  
	  return $choices;
	}


	function acf_add_location_rule_post_stickiness_function($match, $rule, $options) {
	  
	  if (!$options['post_id']) {
	    return false;
	  }
	    
	  $is_sticky = is_sticky($options['post_id']);
	  
	  
	  if ($rule['operator'] == '==') { 
	    $match = $is_sticky;
	  
	  } elseif ($rule['operator'] == '!=') {
	    $match = !$is_sticky;
	  }
	  
	  return $match;
	}
	
}
	
new acf_location_sticky();