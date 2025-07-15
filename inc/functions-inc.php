<?php

/* ========================

====== adminstration ======

=========================== */

function add_customize_section( $wp_customize ) {

	// ============= [ Header ] =================


	$header_section_args	=	array( 	
		'title'			=> 	__( 'Header', 'query' ),
		'priority'		=>	210,
		'Description'	=>	__( 'Customizing The Header Section', 'query' 
	));

	$wp_customize->add_section( "query-header", $header_section_args );


	// ========================== header settings

	$wp_customize->add_setting( "query_logo_activation", [ 
		"default" => true,
		'sanitize_callback' => 'sanitize_text_field' 
	]);

	$wp_customize->add_setting( "query_navbar_activation",  [ 
		"default" => true,
		'sanitize_callback' => 'sanitize_text_field' 
	]);

	$wp_customize->add_setting( "query_latestposts_activation",  [ 
		"default" => true,
		'sanitize_callback' => 'sanitize_text_field' 
	]);

	$wp_customize->add_setting( "query_latestposts_style",  [ 
		"default" => true,
		'sanitize_callback' => 'sanitize_text_field' 
	]);

	// ========================= header controls

	$logo_activation_args	=	 array( 
		'label'		=> 	__( 'logo', 'query' ),
		'section'	=> 	'query-header',
		'settings'	=> 	'query_logo_activation',
		'type'		=> 	'checkbox'
	);

	$wp_customize->add_control( 'logo-activation-control', $logo_activation_args );



	$nabvar_activation_args	=	array(
		'label'		=> 	__( 'navbar', 'query' ),
		'section'	=> 	'query-header',
		'settings'	=> 	"query_navbar_activation",
		'type'		=> 	'checkbox'
	
	);

   $wp_customize->add_control( 'navbar-actiavtion-control', $nabvar_activation_args );


	$latestposts_activation_args = array( 
		'label'		=> 	__( 'latestpost', 'query' ),
		'section'	=> 	'query-header',
		'settings'	=> 	"query_latestposts_activation",
		'type'		=> 	'checkbox'
	);

   	$wp_customize->add_control( 'latestpost-activation-control', $latestposts_activation_args );

	$latestposts_style_args	=	array(
		
		'label'		=> 	__( 'latestpost style', 'query' ),
		'section'	=> 	'query-header',
		'settings'	=> 	"query_latestposts_style",
 		'type'		=> 	'radio',
		'choices'	=> 	array(
			"close"		=> 	__( "close", "query"),
			"fadeOut"	=> 	__( "fade out", "query" ))
		);

	$wp_customize->add_control( 'latestpost-style-control', $latestposts_style_args );

	/* ============ [ home style ] =========== */



	// ================= section register

	$args		=	array( 	'title'				=> __( "Content", "query" ),

										'priority'		=> 210,

										'description'	=> __( "Customizing The Content Section", "query" ) );

	$wp_customize->add_section( 'query-content', $args );


	//  register settings

	$wp_customize->add_setting( "posts_style", array( 
		"default" => "fullwidth",
		"sanitize_callback" => "sanitize_text_field",

	));

	$wp_customize->add_setting( "sidebar_activation", array( 
		"default"	=> true,
		"sanitize_callback" => "sanitize_text_field",
	));

	// ============ posts style	===============

	$post_style_control_args = array( 'label' 		=> 	__( "Choose Posts Style", "query" ),

 																		'section'		=> 	"query-content",

																		'settings'	=>	"posts_style",

																		'type'			=> 'radio',

																		'choices'		=> array( "fullwidth"	=> __( "full width", "query"),

																													"masonry"		=> __( "masonry", "query" ),

																	 												"list"			=> __( "list", "query" )	)	);

	$wp_customize->add_control( "post-style-control", $post_style_control_args );


	// =========== sidebar ===================


	$sidebar_control_args = array( 	'label' 		=> 	__( "sidebar", "query" ),

																	'section'		=> 	"query-content",

																	'settings'	=>	"sidebar_activation",

																	'type'			=> 'checkbox'	);

	$wp_customize->add_control( "sidebar-activation-control", $sidebar_control_args );


	// ============== [ footer section ] ============= */

	$args	=	array(
		'title'			=> 	__( 'Footer', 'query' ),
		'priority'		=> 	215,
		'description'	=> 	__( 'Customizing The Footer Section', 'query' )
	);

	$wp_customize->add_section( "query-footer", $args );

	// ================= settings

	$wp_customize->add_setting( 'copyrights_sentence', array( 
		'default' =>  __( 'All Copyrights Reserved', 'query' ),
		'sanitize_callback' => 'sanitize_text_field' 
	));


	$wp_customize->add_setting( 'socialmedia_buttons_activation',  [ 
	
		"default" => true,
		'sanitize_callback' => 'sanitize_text_field' 
	
	]);

	$wp_customize->add_setting( 'footer_desctription_activation',  [ 
	
		"default" => true,
		'sanitize_callback' => 'sanitize_text_field' 
	
	]);

	// ================= controls

	$copyright_sentence_args	=	array( 	
		'label'		=> __( 'Copyrights Sentence', 'query' ),
		'section'	=> 'query-footer',
		'settings'	=> 'copyrights_sentence',
		'type'		=> 'textarea'
	);

	$wp_customize->add_control( "copyrights-sentence-control", $copyright_sentence_args );

	// ====

	$socialmedia_activation_args	=	array(
		'label'		=> 	__( 'social media buttons', 'query' ),
		'section'	=> 	'query-footer',
		'settings'	=> 	'socialmedia_buttons_activation',
		'type'		=> 	'checkbox'
	);

	$wp_customize->add_control( "socialmedia-buttons-activation-control", $socialmedia_activation_args );


	//===

	$description_activation_args	=		array(
		'label'		=> 	__( 'Description', 'query' ),
		'section'	=> 	'query-footer',
		'settings'	=> 	'footer_desctription_activation',
		'type'		=> 	'checkbox'
	);

	$wp_customize->add_control( "description-activation-control", $description_activation_args );

	// =================== [ single post page ] ================

	$args	=	array( 	
		'title'			=>		__( 'Single Post Page', 'query' ),
 		'priority'		=> 		220,
		'description'	=> 		__( 'customize single post page', 'query' )
	);


	$wp_customize->add_section( 'query-single-post', $args );

	// ========== settings

	$wp_customize->add_setting( 'post_font_family', array( 
		'default' => 'Verdana',
		'sanitize_callback' => 'sanitize_text_field' 
	));

	$wp_customize->add_setting( 'post_font_size', array( 
		'default' => '16',
		'sanitize_callback' => 'sanitize_text_field' 
	));

	$wp_customize->add_setting( 'post_font_weight', array( 
		'default' => 'regular',
		'sanitize_callback' => 'sanitize_text_field' 
	));

	$wp_customize->add_setting('post_author', array(
		'default' => true,
		'sanitize_callback' => 'sanitize_text_field' 
	));

	$wp_customize->add_setting( 'post_categories', array( 
		'default' => true,
		'sanitize_callback' => 'sanitize_text_field' 
	));

	$wp_customize->add_setting( 'post_comments', array(
		'default' => true,
		'sanitize_callback' => 'sanitize_text_field' 
	));

	$wp_customize->add_setting( 'post_tags', array( 
		'default' => true,
		'sanitize_callback' => 'sanitize_text_field' 
	));

	// ============= controls

	$post_font_family_args	=	array( 	
		
		'label'		=>	__( 'content font family', 'query' ),
		'section'	=> 'query-single-post',
		'settings'	=> 'post_font_family',
		'type'		=> 'select',
		'choices'	=> array(
			'tahoma'		=> 	'tahoma',
			'sans serif'	=>	'sans serif',
			'Geogria'		=>	'Georgia',
			'Verdana'		=>	'Verdana'
	));

	$wp_customize->add_control( 'font-family-control', $post_font_family_args );


	// ====

	$post_font_weight_args	=	array(
		'label'		=>	__( 'font weight', 'query' ),
		'section'	=> 'query-single-post',
		'settings'	=> 'post_font_weight',
		'type'		=> 'select',
		'choices'	=> array(
			'lighter'	=> 	__( 'lighter', 'query' ),
			'light'		=> 	__( 'light', 'query' ),
			'regular'	=>	__( 'regular', 'query' ) ,
			'bold'		=>	__( 'bold', 'query' ),
			'bolder'	=>	__( 'bolder', 'query'	) 
	));

	$wp_customize->add_control( 'font-weight-control', $post_font_weight_args );

	// ====

	$post_font_size_args	=	array( 	
		'label'		=> __( 'font size (px)', 'query' ),
		'section'	=> 'query-single-post',
		'settings'	=> 'post_font_size',
		'type'		=> 'number'	
	);

	$wp_customize->add_control( 'font-size-control', $post_font_size_args );

	// ====

	$post_author_args	=	array( 	
		'label'		=> __( 'Author', 'query' ),
		'section'	=> 'query-single-post',
		'settings'	=> 'post_author',
		'type'		=> 'checkbox'
	);

	$wp_customize->add_control( 'post-author-control', $post_author_args );

	// ====

	$post_categories_args	=	array(
		'label'		=> __( 'Categories', 'query' ),
		'section'	=> 'query-single-post',
		'settings'	=> 'post_categories',
		'type'		=> 'checkbox'
	);

	$wp_customize->add_control( 'post-cateogries-control', $post_categories_args );

	//=====

	$post_comments_args	=	array(
		'label'		=>	__( 'Comments', 'query' ),
		'section'	=> 'query-single-post',
		'settings'	=> 'post_comments',
		'type'		=> 'checkbox'
	);

	$wp_customize->add_control( 'post-comments-control', $post_comments_args );


	// ====

	$post_tags_args	=	array(
		'label'		=> __( 'Tags', 'query' ),
		'section'	=> 'query-single-post',
		'settings'	=> 'post_tags',
		'type'		=> 'checkbox'
	);

	$wp_customize->add_control( 'post-tags-control', $post_tags_args );

	/* ============[ color section ]============= */


	$wp_customize->add_setting( 'special_color', array(
		'default'	=> '#E74C3C',
		'sanitize_callback' => 'sanitize_text_field', 
	));

	$special_color_args = array(
		'label'		=> __( 'Choose Special Color For Your Blog', 'query' ),
		'section' 	=> 'colors',
		'priority'	=> 20,
		'settings'	=> 'special_color'
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'special_color_control', $special_color_args ) );


	/* ========================= */


	$wp_customize->add_setting( 'primary_color', array(
		'default'	=> '#FFFFFF',
		'sanitize_callback' => 'sanitize_text_field', 
	));

	$primary_color_args = array( 
		'label'		=> __('Choose Global Color For Your Blog', 'query'),
		'section'	=> 'colors',
		'priority'	=> 	20,
		'settings'	=> 'primary_color'
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color_control', $primary_color_args ) );


	/* ========================= */


	$wp_customize->add_setting( 'secondary_color', array(
		'default'	=> '#EEE',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$secondary_color_args = array(
		'label' 	=> __('Elements Background', 'query'),
		'section'	=> 'colors',
		'priority'	=> 	20,
		'settings'	=> 'secondary_color'
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color_control', $secondary_color_args ) );


	/* ========================= */


	$wp_customize->add_setting( 'font_color', array( 
		'default'	=> '#2C3E50',
		'sanitize_callback' => 'sanitize_text_field', 
	));

	$font_color_args = array(
		'label'		=> __('Font Color', 'query'),
		'section'	=> 'colors',
		'priority'	=> 	20,
		'settings'	=> 'font_color'
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color_control', $font_color_args ) );

	// ===================================== //

	$categories_full_list = get_categories( array( 'orderby' => 'name', ) );
	$categories_options = [ '*' => __( 'all categories', 'query' ) ];

	foreach( $categories_full_list as $category ):

		$categories_options[ $category->slug ] = esc_html( $category->name );

	endforeach;

	$wp_customize->add_setting( 'slider_categorie', [
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => 'uncategorized',
		'sanitize_callback' => 'wp_strip_all_tags',
	]);


	$wp_customize->add_control( 'slider-category', array(
		'type' => 'select',
		'settings'	=>	'slider_categorie',
		'section' => 'query-header',
		'label' => __( 'Select category of posts the slider display', 'query' ),
	//	'description' => __( 'Description.' ),
		'choices' => $categories_options,
	) );


}


add_action( "customize_register", "add_customize_section" );


// enqueue admin style

function query_admin_scripts() {

	wp_enqueue_style( 'query-admin-style', get_template_directory_uri() . '/css/admin.css' , array(), "2.0", "all" );

}

add_action( "admin_enqueue_scripts", "query_admin_scripts" );
