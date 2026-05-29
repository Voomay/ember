<?php
/**
 * Ember & Iron functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ember_iron_setup() {
	// Enable document title tag support
	add_theme_support( 'title-tag' );
	
	// Enable featured image support
	add_theme_support( 'post-thumbnails' );
	
	// Enable clean HTML5 markup output
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	
	// Register header navigation menu placement
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ember-and-iron' ),
	) );
}
add_action( 'after_setup_theme', 'ember_iron_setup' );

/**
 * Enqueue stylesheets and scripts
 */
function ember_iron_scripts() {
	// Load Google Fonts
	wp_enqueue_style( 'ember-iron-fonts', 'https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Oswald:wght@500;700&family=Inter:wght@400;500;600;700&display=swap', array(), null );
	
	// Load Font Awesome icons
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
	
	// Load Theme Stylesheet
	wp_enqueue_style( 'ember-iron-stylesheet', get_stylesheet_uri(), array(), '1.0.0' );
	
	// Load Theme Scripts
	wp_enqueue_script( 'ember-iron-script', get_template_directory_uri() . '/src/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'ember_iron_scripts' );

/**
 * Register Projects Custom Post Type
 */
function ember_iron_register_projects_cpt() {
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'ember-and-iron' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'ember-and-iron' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'ember-and-iron' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'ember-and-iron' ),
		'add_new'            => _x( 'Add New', 'project', 'ember-and-iron' ),
		'add_new_item'       => __( 'Add New Project', 'ember-and-iron' ),
		'new_item'           => __( 'New Project', 'ember-and-iron' ),
		'edit_item'          => __( 'Edit Project', 'ember-and-iron' ),
		'view_item'          => __( 'View Project', 'ember-and-iron' ),
		'all_items'          => __( 'All Projects', 'ember-and-iron' ),
		'search_items'       => __( 'Search Projects', 'ember-and-iron' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'ember-and-iron' ),
		'not_found'          => __( 'No projects found.', 'ember-and-iron' ),
		'not_found_in_trash' => __( 'No projects found in Trash.', 'ember-and-iron' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projects-portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-portfolio',
		'supports'           => array( 'title', 'thumbnail' )
	);

	register_post_type( 'projects', $args );

	// Register Project Category Taxonomy
	$taxonomy_labels = array(
		'name'              => _x( 'Project Categories', 'taxonomy general name', 'ember-and-iron' ),
		'singular_name'     => _x( 'Project Category', 'taxonomy singular name', 'ember-and-iron' ),
		'search_items'      => __( 'Search Categories', 'ember-and-iron' ),
		'all_items'         => __( 'All Categories', 'ember-and-iron' ),
		'parent_item'       => __( 'Parent Category', 'ember-and-iron' ),
		'parent_item_colon' => __( 'Parent Category:', 'ember-and-iron' ),
		'edit_item'         => __( 'Edit Category', 'ember-and-iron' ),
		'update_item'       => __( 'Update Category', 'ember-and-iron' ),
		'add_new_item'      => __( 'Add New Category', 'ember-and-iron' ),
		'new_item_name'     => __( 'New Category Name', 'ember-and-iron' ),
		'menu_name'         => __( 'Project Categories', 'ember-and-iron' ),
	);

	$taxonomy_args = array(
		'hierarchical'      => true,
		'labels'            => $taxonomy_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-category' ),
	);

	register_taxonomy( 'project_category', array( 'projects' ), $taxonomy_args );
}
add_action( 'init', 'ember_iron_register_projects_cpt' );

// Include dynamic custom forms POST contact router
require_once get_template_directory() . '/inc/contact-handler.php';

/**
 * Clean phone numbers to only digits for tel: links
 */
function ember_iron_clean_phone( $phone ) {
	return preg_replace( '/[^0-9]/', '', $phone );
}

/**
 * Clean and format WhatsApp link automatically
 */
function ember_iron_whatsapp_link( $number ) {
	$clean = preg_replace( '/[^0-9]/', '', $number );
	if ( strpos( $clean, '0' ) === 0 && strlen( $clean ) === 10 ) {
		$clean = '27' . substr( $clean, 1 );
	}
	return 'https://wa.me/' . $clean;
}

/**
 * Register Customizer settings for phone numbers and email
 */
function ember_iron_customize_register( $wp_customize ) {
	// Add section for Contact Info
	$wp_customize->add_section( 'ember_iron_contact_section', array(
		'title'    => __( 'Contact Information', 'ember-and-iron' ),
		'priority' => 30,
	) );

	// Setting: Business Phone Number
	$wp_customize->add_setting( 'ember_iron_phone', array(
		'default'           => '+27 (0) 62 943 8090',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'ember_iron_phone', array(
		'label'    => __( 'Business Phone Number', 'ember-and-iron' ),
		'section'  => 'ember_iron_contact_section',
		'type'     => 'text',
	) );

	// Setting: WhatsApp Number
	$wp_customize->add_setting( 'ember_iron_whatsapp', array(
		'default'           => '+27 (0) 62 943 8090',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'ember_iron_whatsapp', array(
		'label'    => __( 'WhatsApp Number', 'ember-and-iron' ),
		'section'  => 'ember_iron_contact_section',
		'type'     => 'text',
		'description' => __( 'Can be different from the business number. Standard or international format.', 'ember-and-iron' ),
	) );

	// Setting: Contact Email
	$wp_customize->add_setting( 'ember_iron_email', array(
		'default'           => 'info@emberandiron.co.za',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'ember_iron_email', array(
		'label'    => __( 'Contact Email Address', 'ember-and-iron' ),
		'section'  => 'ember_iron_contact_section',
		'type'     => 'email',
		'description' => __( 'All contact form submissions will be sent to this email address.', 'ember-and-iron' ),
	) );
}
add_action( 'customize_register', 'ember_iron_customize_register' );
