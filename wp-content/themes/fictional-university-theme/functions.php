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
//menu s
 function university_features(){
 	//register menu location for header
 	// register_nav_menu('headerMenuLocation', 'Header Menu Location');

 	// //register menu location for footer 
 	// register_nav_menu('footerLocationOne', 'Footer Location one');
 	// register_nav_menu('footerLocationTwo', 'Footer Location Two');
}
	//menus
 	add_theme_support('title-tag');





?>