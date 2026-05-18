<?php

function bim_register_menus() {
	register_nav_menus([
		'menu-header' => 'Menu Principal',
		'menu-footer' => 'Menu Footer',
	]);
}

add_action('init', 'bim_register_menus');

function bim_add_options_pages() {
	
	acf_add_options_page([
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	]);
	
}

add_action('init', 'bim_add_options_pages');
