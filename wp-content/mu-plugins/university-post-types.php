<?php




function university_post_types(){
	//events are controlled by theme so not the best place to keep the 
	//event post type
	register_post_type('event', array(
		//to find the parameters we can google for register post types
			'supports'=> array(
						'title', 'editor', 'excerpt'), //title and editor are the default
			'rewrite' => array(
			 				'slug' => 'events'), //for chnging the slug 
			'has_archive' => true, //for archive  if dont show archive setting and savechanges the permalinks  structure  without editing  
			'public' => true, //make visisble to all
			'labels' => array(
				'name' => 'Events', //naming 
				'add_new_item' => 'Add New Event', //for chnging add new post
				'edit_item' => 'Edit Event',
				'all_items' => 'All Events',
				'singular_name' => 'Event'

			),
			'menu_icon' => 'dashicons-calendar',  //google wordpress dashicon

			// flush_rewrite_rules( false );

		));


		//proram post type
		register_post_type('program', array(
		//to find the parameters we can google for register post types
			'supports'=> array(
						'title', 'editor'), //title and editor are the default
			'rewrite' => array(
			 				'slug' => 'programs'), //for chnging the slug 
			'has_archive' => true, //for archive  if dont show archive setting and savechanges the permalinks  structure  without editing  
			'public' => true, //make visisble to all
			'labels' => array(
				'name' => 'Programs', //naming 
				'add_new_item' => 'Add New Program', //for chnging add new post
				'edit_item' => 'Edit Program',
				'all_items' => 'All Programs',
				'singular_name' => 'Program'

			),
			'menu_icon' => 'dashicons-awards',  //google wordpress dashicon

			// flush_rewrite_rules( false );

		));

		//profressor post type
		register_post_type('professor', array(
		//to find the parameters we can google for register post types
			'supports'=> array(
						'title', 'editor', 'thumbnail'), //title and editor are the default
			'public' => true, //make visisble to all
			'labels' => array(
				'name' => 'Professors', //naming 
				'add_new_item' => 'Add New Professor', //for chnging add new post
				'edit_item' => 'Edit Professor',
				'all_items' => 'All Professors',
				'singular_name' => 'Professor'

			),
			'menu_icon' => 'dashicons-welcome-learn-more',  //google wordpress dashicon

			// flush_rewrite_rules( false );

		));

		register_post_type('campus', array(
		//to find the parameters we can google for register post types
			'supports'=> array(
						'title', 'editor', 'excerpt'), //title and editor are the default
			'rewrite' => array(
			 				'slug' => 'campuses'), //for chnging the slug 
			'has_archive' => true, //for archive  if dont show archive setting and savechanges the permalinks  structure  without editing  
			'public' => true, //make visisble to all
			'labels' => array(
				'name' => 'Campuses', //naming 
				'add_new_item' => 'Add New Campus', //for chnging add new post
				'edit_item' => 'Edit Campus',
				'all_items' => 'All Campuses',
				'singular_name' => 'Campus'

			),
			'menu_icon' => 'dashicons-location-alt',  //google wordpress dashicon

			// flush_rewrite_rules( false );

		));



}

//register and create custom-post type
add_action('init', 'university_post_types');