<?php

//for title
add_action('after_setup_theme','university_features');

function university_post_types(){
	//events are controlled by theme so not the best place to keep the 
	register_post_type('event', array(
		//to find the parameters we can google for register post types
			'public' => true, //make visisble to all
			'labels' => array(
				'name' => 'Events', //naming 
				'add_new_item' => 'Add New Event', //for chnging add new post
				'edit_item' => 'Edit Event',
				'all_items' => 'All Events',
				'singular_name' => 'Event'

			),
			'menu_icon' => 'dashicons-calendar'  //google wordpress dashicon
		));
}

//register and create custom-post type
add_action('init', 'university_post_types');