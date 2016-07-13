<?php

	function audience_customizer_register($wp_customize)
	{
		$wp_customize->add_section('config_theme', array(
			'title' => __('Settings Audience Theme'),
			'description' => ""
		));

		$wp_customize->add_setting('buy_setting', array(
			'default' => ''
		));

		$wp_customize->add_setting('twitter_setting', array(
			'default' => ''
		));

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'buy_control',
				array(
					'label' 	=> __("Link to buy:", "Audience"),
					'section' 	=> "config_theme",
					'settings'	=> "buy_setting",
					'type'		=> "text"
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'twitter_control',
				array(
					'label' 	=> __("Twitter:", "Audience"),
					'section' 	=> "config_theme",
					'settings'	=> "twitter_setting",
					'type'		=> "text"
				)
			)
		);
	}
	add_action('customize_register','audience_customizer_register');

	function change_post_type($type)
	{
		global $wpdb;
		if($type == 'activate'){
			$wpdb->query("UPDATE $wpdb->posts SET post_type = 'articles' WHERE post_type = 'post'");
		}elseif($type == 'deactivate'){
			$wpdb->query("UPDATE $wpdb->posts SET post_type = 'post' WHERE post_type = 'articles'");
			// $wpdb->query("UPDATE $wpdb->posts SET post_type = 'post' WHERE post_type = 'case-studies'");
		}
	}

	function create_menu_itens($menu_name)
	{
		// Check if the menu exists
		$menu_exists = wp_get_nav_menu_object( $menu_name );

		// If it doesn't exist, let's create it.
		if( !$menu_exists){

		    $menu_id = wp_create_nav_menu($menu_name);

			// Set up default menu items
		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Writing'),
		        'menu-item-url' => home_url( '/articles/' ), 
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Case Studies'),
		        'menu-item-url' => home_url( '/cases/' ), 
		        'menu-item-status' => 'publish'));

		}
	}

	function create_pages()
	{
	    $pages = array();

	    $pages[] = array(
	        'post_title' 	=> 'Articles',
	        'post_content' 	=> '',
	        'post_status' 	=> 'publish',
	        'post_author' 	=> get_user_by( 'id', 1 )->user_id,
	        'post_type' 	=> 'page',
	        'post_category' => array(0),
	        'menu_order' 	=> 0,
	        'page_template'	=> 'page-articles.php'
	    );
	    $pages[] = array(
	        'post_title' 	=> 'Cases',
	        'post_content' 	=> '',
	        'post_status' 	=> 'publish',
	        'post_author' 	=> get_user_by( 'id', 1 )->user_id,
	        'post_type' 	=> 'page',
	        'post_category' => array(0),
	        'menu_order' 	=> 0,
	        'page_template'	=> 'page-case-studies.php'
	    );

	    foreach ($pages as $key => $page) {
	    	$post_id = wp_insert_post($page);
	    }
	}

	// Registers the new post type and taxonomy

	function create_post_presentation()
	{
		$labels = array(
			'name' 					=> 'Presentation',
			'menu_name' 			=> 'Presentation',
			'name_admin_bar' 		=> 'Presentation',
			'add_new' 				=> 'Create presentation',
			'add_new_item' 			=> 'New presentation',
			'edit_item'				=> 'Edit presentation',
			'view_item'				=> 'View presentation',
			'search_items'			=> 'Search presentation',
			'not_found'				=> 'No presentation found',
			'not_found_in_trash'	=> 'No presentation found in trash',
		);

		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'show_ui'				=> true,
			'rewrite'				=> array('slug' => 'presentation'),
			'menu_postition'		=> 10,
			'supports'				=> array('title','editor', 'thumbnail'),
			'menu_icon'				=> 'dashicons-welcome-add-page',
			'can_export' 			=> true,
			'capability_type' 		=> 'post',
		);

		register_post_type('presentation', $args);
	}
	add_action('init', 'create_post_presentation');

	// Registers the new post type and taxonomy

	function create_post_social_media()
	{
		$labels = array(
			'name' 					=> 'Social Media',
			'menu_name' 			=> 'Social Media',
			'name_admin_bar' 		=> 'Social Media',
			'add_new' 				=> 'Create social media',
			'add_new_item' 			=> 'New social media',
			'edit_item'				=> 'Edit social media',
			'view_item'				=> 'View social media',
			'search_items'			=> 'Search social media',
			'not_found'				=> 'No social media found',
			'not_found_in_trash'	=> 'No social media found in trash',
		);

		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'show_ui'				=> true,
			'rewrite'				=> array('slug' => 'social-media'),
			'menu_postition'		=> 10,
			'supports'				=> array('title','editor'),
			'menu_icon'				=> 'dashicons-welcome-add-page',
			'can_export' 			=> true,
			'capability_type' 		=> 'post',
		);

		register_post_type('social-media', $args);
	}
	add_action('init', 'create_post_social_media');

	// Registers the new post type and taxonomy

	function create_post_case()
	{
		$labels = array(
			'name' 					=> 'Case Studies',
			'menu_name' 			=> 'Case Studies',
			'name_admin_bar' 		=> 'Case Study',
			'add_new' 				=> 'Create case',
			'add_new_item' 			=> 'New case',
			'edit_item'				=> 'Edit case',
			'view_item'				=> 'View case',
			'search_items'			=> 'Search case',
			'not_found'				=> 'No cases found',
			'not_found_in_trash'	=> 'No cases found in trash',
		);

		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'show_ui'				=> true,
			'rewrite'				=> array('slug' => 'case-studies'),
			'menu_postition'		=> 10,
			'supports'				=> array('title','editor', 'thumbnail', 'excerpt'),
			'taxonomies' 			=> array('category','post_tag'),
			'menu_icon'				=> 'dashicons-welcome-add-page',
			'can_export' 			=> true,
			'capability_type' 		=> 'post',
		);

		register_post_type('case-studies', $args);
	}
	add_action('init', 'create_post_case');

	// Registers the new post type and taxonomy

	function create_post_article()
	{
		$labels = array(
			'name' 					=> 'Articles',
			'menu_name' 			=> 'Articles',
			'name_admin_bar' 		=> 'Article',
			'add_new' 				=> 'Create article',
			'add_new_item' 			=> 'New article',
			'edit_item'				=> 'Edit article',
			'view_item'				=> 'View article',
			'search_items'			=> 'Search article',
			'not_found'				=> 'No articles found',
			'not_found_in_trash'	=> 'No articles found in trash',
		);

		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'show_ui'				=> true,
			'rewrite'				=> array('slug' => 'articles'),
			'menu_postition'		=> 11,
			'supports'				=> array('title', 'editor', 'thumbnail', 'excerpt'),
			'taxonomies' 			=> array('category','post_tag'),
			'menu_icon'				=> 'dashicons-welcome-learn-more',
			'can_export' 			=> true,
			'capability_type' 		=> 'post',
		);

		register_post_type('articles', $args);
	}
	add_action('init', 'create_post_article');

	// Registers the new post type and taxonomy

	function create_post_project()
	{
		$labels = array(
			'name' 					=> 'Side Projects',
			'menu_name' 			=> 'Side Projects',
			'name_admin_bar' 		=> 'Side Project',
			'add_new' 				=> 'Create project',
			'add_new_item' 			=> 'New project',
			'edit_item'				=> 'Edit project',
			'view_item'				=> 'View project',
			'search_items'			=> 'Search project',
			'not_found'				=> 'No projects found',
			'not_found_in_trash'	=> 'No projects found in trash',
		);

		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'show_ui'				=> true,
			'rewrite'				=> array('slug' => 'side-projects'),
			'menu_postition'		=> 10,
			'supports'				=> array('title','editor', 'thumbnail'),
			'menu_icon'				=> 'dashicons-welcome-add-page',
			'can_export' 			=> true,
			'capability_type' 		=> 'post',
		);

		register_post_type('side-projects', $args);
	}
	add_action('init', 'create_post_project');

	if ( ! function_exists( 'audience_theme_setup' ) ) :
	function audience_theme_setup()
	{
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
	endif;
	add_action( 'after_setup_theme', 'audience_theme_setup' );

	require_once "lib/bootstrap.php";

/**
* Provides activation/deactivation hook for wordpress theme.
*
* Usage:
* ----------------------------------------------
* Include this file before this line.
* ----------------------------------------------
* function my_theme_activate() {
*    // code to execute on theme activation
* }
* wp_register_theme_activation_hook('mytheme', 'my_theme_activate');
*
* function my_theme_deactivate() {
*    // code to execute on theme deactivation
* }
* wp_register_theme_deactivation_hook('mytheme', 'my_theme_deactivate');
* ----------------------------------------------
*
* @author Krishna Kant Sharma (http://www.krishnakantsharma.com)
*/
function my_theme_activate() {
	register_nav_menu('primary', __( 'Primary menu', 'audience-theme' ));

	change_post_type('activate');
	
	// create_menu_itens('primary');
	
	create_pages();
}
wp_register_theme_activation_hook('mytheme', 'my_theme_activate');

function my_theme_deactivate() {

	change_post_type('deactivate');

	global $wpdb;

	$pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'page'");
	
	foreach ($pages as $key => $page) {
		wp_delete_post($page->ID);
	}
}
wp_register_theme_deactivation_hook('mytheme', 'my_theme_deactivate');
/**
*
* @desc registers a theme activation hook
* @param string $code : Code of the theme. This can be the base folder of your theme. Eg if your theme is in folder 'mytheme' then code will be 'mytheme'
* @param callback $function : Function to call when theme gets activated.
*/
function wp_register_theme_activation_hook($code, $function) {
$optionKey="theme_is_activated_" . $code;
  if(!get_option($optionKey)) {
    call_user_func($function);
    update_option($optionKey , 1);
  }
}

/**
* @desc registers deactivation hook
* @param string $code : Code of the theme. This must match the value you provided in wp_register_theme_activation_hook function as $code
* @param callback $function : Function to call when theme gets deactivated.
*/
function wp_register_theme_deactivation_hook($code, $function) {
  // store function in code specific global
  $GLOBALS["wp_register_theme_deactivation_hook_function" . $code]=$function;

  // create a runtime function which will delete the option set while activation of this theme and will call deactivation function provided in $function
  $fn=create_function('$theme', ' call_user_func($GLOBALS["wp_register_theme_deactivation_hook_function' . $code . '"]); delete_option("theme_is_activated_' . $code. '");');

  // add above created function to switch_theme action hook. This hook gets called when admin changes the theme.
  // Due to wordpress core implementation this hook can only be received by currently active theme (which is going to be deactivated as admin has chosen another one.
  // Your theme can perceive this hook as a deactivation hook.)
  add_action("switch_theme", $fn);
}