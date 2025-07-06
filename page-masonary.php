<?php
/**
* @package WordPress
* @subpackage Query
* @since  1.0
* @version 1.2 Final
*/ ?>

<?php get_header(); ?>


  <?php $latestposts_actv = get_theme_mod( 'query_latestposts_activation', true ); ?>


  <?php $is_mobile = true; ?>
  <?php if( $latestposts_actv ): ?>
    <?php get_template_part( "latest-posts" ); ?>
  <?php endif; ?>

  <div id="content" class=" col-xs-12">

    <?php $home_style       = "masonry" ?>

    <?php $sidebar          =  get_theme_mod( "sidebar_activation", true ); ?>

    <?php $default_class    = ( $sidebar == true ? 'col-md-12 with-sidebar' : 'col-md-10' ); ?>

    <?php $articles_class   = ( $sidebar == true ? 'col-md-8 with-sidebar' : 'col-md-12' ); ?>

    <?php $masonary_class   = ( $sidebar == true ? 'col-md-6 with-sidebar' : 'col-md-4' ); ?>

    <?php $class  = ( $home_style == "masonry" ? $masonary_class : $default_class ); ?>

    <?php set_query_var( 'with-sidebar', $class ); ?>


    <?php $args   = array( 
      
      'post_type' => 'post',
      'posts_per_page' => 9,
      
    ); ?>

    <?php $query  = new WP_QUERY($args); ?>


    <div class="articles col-xs-12 <?php printf( "%s %s", $articles_class, $home_style ); ?>">

      <?php 

        $loved_posts =( isset( $_COOKIE[ 'loved_posts' ] ) ? json_decode( stripslashes($_COOKIE[ 'loved_posts' ]) ) : [] );
        set_query_var( "loves", $loved_posts ); 

      ?>

      <?php if ( $query->have_posts() ): ?>


        <?php while( $query->have_posts() ): ?>


          <?php $query->the_post(); ?>

          <?php $id = "post-" . get_the_ID(); ?>

          <?php	get_template_part( "template-parts/post/" . $home_style . "/content", get_post_format() ); ?>

          
          
          <?php endwhile; ?>
          
          <?php wp_reset_postdata(); ?>
          
        <?php endif; ?>

    </div><!-- .articles -->


    <?php if( $sidebar == true /*&& !$is_mobile->isMobile() */ ): ?>

      <aside class="sidebar col-md-4 hidden-sm hidden-xs">

        <?php dynamic_sidebar( 'query-sidebar' ); ?>

      </aside><!-- aside -->

    <?php endif; ?>
  </div><!-- #content -->

  <?php get_footer() ?>

