<?php

//to load java scrits css files
function university_files(){

	//font-asesome
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	//custom fonts
	wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	//main styles
	wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}

//for css loadng scripts css
add_action('wp_enqueue_scripts', 'university_files');

?>