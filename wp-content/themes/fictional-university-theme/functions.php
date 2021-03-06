<?php


//reuse abke function for ourselfs
function pageBanner($args = NULL){
	// php logic will live here
	//for fall back
	if (!$args['title']){
		$args['title'] = get_the_title(); //if not tilte we will use wordpress title
	}

	if (!$args['subtitle']){
		$args['subtitle'] = get_field('page_banner_sub_title'); 
	}
	if (!$args['photo']){
		if(get_field('page_banner_background_image')){
			$args['photo'] = get_field('page_banner_background_image') ['sizes']['pageBanner'];
		} else {
			$args['photo'] = get_theme_file_uri('/assets/images/ocean.jpg');
		}
	}
	?>
	<div class="page-banner">
	    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
	    <div class="page-banner__content container container--narrow">
	      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
	      <div class="page-banner__intro">
	        <p><?php echo $args['subtitle']; ?></p>
	      </div>
	    </div>  
	  </div>


<?php

}



//--------------------------------------------
//to load java scrits css files
function university_files(){

	//loading google map js files
	wp_enqueue_script('googleMap','//maps.googleapis.com/maps/api/js?key=AIzaSyDAULTX8Dia0xqxV4hu6DawbLHHiMd_pCA', NUll, '1.0', true); //true loading in down

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
 	add_image_size('pageBanner', 1500, 350 , true);

 }

 add_action('after_setup_theme','university_features');


//------------------------------------------------------
//wp pass $query
function university_adjust_queries($query){

	//for  program
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
	//for camous
	if(!is_admin() AND is_post_type_archive('campus') ANd $query->is_main_query()){
		$query->set('posts_per_page', -1);


	} 
	
}


//for twiking the event post type
 	add_action('pre_get_posts', 'university_adjust_queries'); //it  wworks before default wp query
//---------------------------------------
//for google map key api
 	function universityMapKey($api){
 		$api['key'] = 'AIzaSyDAULTX8Dia0xqxV4hu6DawbLHHiMd_pCA';
 		return $api;
 	}

add_filter('acf/fields/google_map/api', 'universityMapKey' );

?>