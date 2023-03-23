<?php


//  check if content is empty

function empty_content($str) {
	return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
}

// enqueue styles & scripts



function query_enqueue_scripts() {


	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.7.7' );



	wp_enqueue_style( 'query-style', get_template_directory_uri() . '/css/style.css' , array(), "2.0", "all" );


	if( is_rtl() ) {
		wp_enqueue_style( "query-rtl", get_template_directory_uri() . '/css/rtl.css' , array(), "2.0", "all" );
	}




	wp_enqueue_script( "query-js", get_template_directory_uri() . "/js/script.min.js", array( "jquery", "jquery-effects-core" ), '2.0', true );


	// ========== set post content css prop

	$post_font_size 		= 	get_theme_mod( "post_font_size", 16 );

	$post_font_family		=		get_theme_mod( "post_font_family", 'Verdana, tahoma' );

	$post_font_weight		=		get_theme_mod( "post_font_weight", 'regular' );

	$post_content_prop 	=		array( 	'font' 		=> 	$post_font_family,

																	'size'		=> 	$post_font_size,

																	'weight'	=> 	$post_font_weight );

	wp_localize_script( "query-js", "postcontent", $post_content_prop );

// ===

	
	$special	=	get_theme_mod( 'special_color', '#E74C3C' );
	$primary	=	get_theme_mod( 'primary_color', "#FFFFFF" );
	$secondary	=	get_theme_mod( 'secondary_color', '#EEEEEE' );
	$text		=	get_theme_mod( 'font_color', '#2C3E50' );

	$colors		=	sprintf( 
		":root{ --special-color: %s; --primary-color: %s; --font-color: %s; --secondary-color: %s; }",
		$special,
		$primary,
		$text,
		$secondary
	);

	wp_add_inline_style( "query-style", $colors );

// ===

	wp_localize_script( 'query-js', 'ajax', array( 'url'	=> admin_url( 'admin-ajax.php' ), 'noposts'	=> __( " there's no more posts ", "query" ) ) );

	wp_enqueue_script( "bootstrap-js", get_template_directory_uri() . "/js/bootstrap.js", array( "jquery" ), '3.7.7', true );

	wp_enqueue_script( "awesomefont-all", get_template_directory_uri() . "/js/fontawesome-all.min.js", array( "jquery" ), '5.0.10', true );

	wp_enqueue_script( "jquery" );


}



add_action("wp_enqueue_scripts", 'query_enqueue_scripts');






function query_register_menu() {



	get_theme_support("menus");



	register_nav_menu("navtop", __( "the navbar", "query" ) );



}



add_action("init", "query_register_menu");



function query_theme_supports( ) {

	
	add_theme_support( 'post-formats', array( 'video', 'gallery', 'status', 'audio', 'image' ) );

	add_theme_support( 'custom-logo' );

	add_theme_support( "title-tag" );

	add_theme_support( "automatic-feed-links" );

	add_theme_support( 'post-thumbnails' );

    add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
        'navigation-widgets',
        )
    );

}



add_action( "after_setup_theme", "query_theme_supports" );



// set excerpt read symbole



function wpdocs_excerpt_more( $more ) {

    return ' ... ';

}



add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );




// seo =============



function opengraph() {



		global $post;



    if( is_single() ):



        if( has_post_thumbnail( $post->ID ) ) {



				$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				$img_src = ( is_array( $img_src ) && !empty( $img_src ) ? array_shift( $img_src ) : false );



			  } else {



				$custom_logo_id = get_theme_mod( 'custom_logo' );

				$img_src = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$img_src = ( is_array( $img_src ) && !empty( $img_src ) ? array_shift( $img_src ) : false );





				}



			  if( $excerpt = $post->post_excerpt ) {



			      $excerpt = strip_tags($post->post_excerpt);


						$excerpt = str_replace("", "'", $excerpt);



			  } else {



			      $excerpt = get_bloginfo('description');



			  } ?>



    <meta property="og:title" content="<?php echo the_title(); ?>"/>



		<meta property="og:description" content="<?php echo $excerpt; ?>"/>



		<meta property="og:type" content="article"/>



		<meta property="og:url" content="<?php echo the_permalink(); ?>"/>



		<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>



		<meta property="og:image" content="<?php echo $img_src; ?>"/>



<?php endif;



}


add_action('wp_head', 'opengraph', 5);


// edit title

function query_title_edit( $title ) {

	if( is_single() & is_home() ):

		$output = get_bloginfo('name') . " " . $title;

	else:

		$output = $title;

	endif;

	return $output;

}

add_filter( "wp_title", "query_title_edit" );


// include admin panel



require get_template_directory() . "/inc/functions-inc.php";



// load translation files

function query_load_textdomain() {

	load_theme_textdomain( "query", get_template_directory() . "/languages" );

}

add_action( "after_setup_theme", "query_load_textdomain" );

add_action( "wp_ajax_load_new_posts", 'query_posts_load' );

add_action( "wp_ajax_nopriv_load_new_posts", 'query_posts_load' );

function query_posts_load( ) {

	ob_clean();

	$id				=	$_POST['pageId'] + 1;

	$args 		= array( 	'paged'					 	=> $id,

									'posts_per_page'	=>  get_option( 'posts_per_page', 10 ),

									'post_status'			=> 'publish' );

	$post 		=		new WP_QUERY( $args );

  $home_style       = 	get_theme_mod( 'posts_style',   "fullwidth" );

  $sidebar          =  	get_theme_mod( "sidebar_activation", true );

  $default_class    = 	( $sidebar == true ? 'col-md-12 with-sidebar' : 'col-md-10' );

  $masonary_class   = 	( $sidebar == true ? 'col-md-6 with-sidebar' : 'col-md-4' );

  $class  = ( $home_style == "masonry" ? $masonary_class : $default_class );

  set_query_var( 'with-sidebar', $class );


	if( $post->have_posts() ):

		while( $post->have_posts() ):

		$post->the_post();

	 	get_template_part( 'template-parts/post/'. $home_style . '/content', get_post_format() );



 		endwhile;

	endif;



	die();

}


function query_custom_thumbnail_size() {

	add_image_size( 'wide-thum', 895, 300, true );

	add_image_size( 'slider-big-post', 570, 520, true );

	add_image_size( 'slider-wide-post', 570, 260, true );

	add_image_size( 'slider-small-post', 285, 260, true );

}


add_action( 'after_setup_theme', "query_custom_thumbnail_size" );


// ============== post love button

add_action( 'wp_ajax_love_post_button', "query_love_post_button" );

add_action( 'wp_ajax_nopriv_love_post_button', "query_love_post_button" );


function query_love_post_button() {

	ob_clean();

	$love	= ( isset($_POST['todo']) && is_string($_POST['todo']) && $_POST['todo'] == 'love' ? true : false );
	//$love	= true;
	$ID		= ( isset( $_POST['postID'] ) && is_numeric( $_POST['postID'] ) && get_post_status( $_POST['postID'] ) ? intval( $_POST['postID'] ) : false );
	
	if(!$ID ) { die(0); }
	
	$counter	=	get_metadata( 'post', $ID, '_query_loves', true );
	$counter	=	( $counter ? intval( $counter ) : 0 );

	
	if( isset( $_COOKIE[ 'loved_posts' ]) ) {

		if( ($loved_posts = json_decode( stripslashes($_COOKIE[ 'loved_posts' ]), true ) ) == NULL ) {
			$loved_posts = [];
		}
	} else {
		$loved_posts = [];
	}
	

	if( !$love && in_array( $ID, $loved_posts ) ) {
		$loved_posts = array_filter( $loved_posts, function( $post_id ) use ($ID) {  return $post_id != $ID; });
		update_post_meta( $ID, '_query_loves', $counter - 1  );
		
	} else if( $love && !in_array( $ID, $loved_posts ) ) {
		$loved_posts[] = $ID;
		update_post_meta( $ID, '_query_loves', $counter + 1 );
	}
	
	setcookie( 'loved_posts', json_encode( $loved_posts ), time() + 60*60*24*365*100, COOKIEPATH, COOKIE_DOMAIN );
	

	echo ( $love ? "loved" : 'unloved' );

	die();

}


function get_words( $sentence, $count = 110 ) {

	$imploded	=	explode( ' ', $sentence );

	$sliced		=	array_slice( $imploded, 0, $count );

	$sentence	=	 implode( ' ', $sliced );

	return $sentence;

}

// ===================[ the sidebar ]========================

function query_side_bar() {

	$args	=	array( 	'name'					=> 	__( 'the side bar', "query" ),

									'id'						=> 	"query-sidebar",

									'Description'		=> 	'the left sidebar',

									'class'					=> 	'qr-sidebar',

									'before_widget'	=> 	'<div class="item col-xs-12">',

									'after_widget'	=> 	'</div>',

									'before_title'	=> 	'<h3 class="item-title">',

									'after_title'		=> 	"</h3>" );

	register_sidebar( $args );

}

add_action( "widgets_init", "query_side_bar" );


//  ==================== [ social media menu ]

function query_social_media_menu() {

	register_nav_menu( "query-social-media", __( 'social media menu', 'query' ) );

}

add_action( "init", "query_social_media_menu" );


//  ==================== [ search ajax ]

add_action( "wp_ajax_nav_search", "query_search_results" );

add_action( "wp_ajax_nopriv_nav_search", "query_search_results" );


function query_search_results() {


	ob_clean();


	$results	=	[];

	$keyword	=	wp_strip_all_tags( $_POST['keyword'] );
	$args 		= 	array( 'posts_per_page'	=>  get_option( 'posts_per_page', 10 ), "post_status" => "publish", "s"	=> $keyword );
	$posts		=	new WP_QUERY( $args );


		if( $posts->have_posts() ):

			while( $posts->have_posts() ):

				$posts->the_post();

				$results[] = [

					'title' => get_the_title(),
					'thumbnail' => get_the_post_thumbnail_url( get_the_id(), 'thumbnail' ),
					'permalink' => get_permalink(),
					'author_name' =>  esc_html( get_the_author_meta('display_name') ),
					'date' => get_the_date()

				];


			endwhile;

		endif;

		echo json_encode( $results );

	die();

}



