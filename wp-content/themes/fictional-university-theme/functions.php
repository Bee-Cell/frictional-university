<?php
//--------------------------------------------
//to load java scrits css files
function university_files(){

	//loading js file
	wp_enqueue_script('main-university-js', get_theme_file_uri('/assets/js/scripts-bundled.js'), NULL, microtime() , true); //null for depndencies, version 1, load at beging or at last true, false

	//font-asesome
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	//custom fonts
	wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	//main styles
	wp_enqueue_style('university_main_styles', get_stylesheet_uri(), NULL, microtime());
}

//for css loadng scripts css
add_action('wp_enqueue_scripts', 'university_files');


//-------------------------------
//different feature ww wanna support
 function university_features(){
 	//register menu location for header
 	// register_nav_menu('headerMenuLocation', 'Header Menu Location');

 	// //register menu location for footer 
 	// register_nav_menu('footerLocationOne', 'Footer Location one');
 	// register_nav_menu('footerLocationTwo', 'Footer Location Two');

	
 	add_theme_support('title-tag'); //for excerpt for blog only
 	add_theme_support('post-thumbnails'); //feature image it enable only for blog post but to the plugins w created 
 	//two new images sizes
 	add_image_size('professorLandscape', 400,260, true); //nickname and size and croping ture or false
 	add_image_size('professorPortrait', 480, 650, true);

 }

 add_action('after_setup_theme','university_features');


//------------------------------------------------------
//wp pass $query
function university_adjust_queries($query){

	//for 
	if(!is_admin() AND is_post_type_archive('program') ANd $query->is_main_query()){
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
		$query->set('posts_per_page', -1);


	}

//for event archive all
	if (!is_admin() AND is_post_type_archive('event') AND 
		$query->is_main_query()) {
		 $today = date('Ymd');
		$query->set('meta_key' , 'event_date');
		$query->set('orderby' , 'meta_value_num');
		$query->set('order' , 'ASC');
		$query->set('meta_query' , array(
                array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today, 
                  'type' => 'numeric'
                )
              ));

	} 
	
}


//for twiking the event post type
 	add_action('pre_get_posts', 'university_adjust_queries'); //it  wworks before default wp query


?>