<?php get_header() ?>



  <div class="archive-page-title">



    <h3> <?php wp_title(""); ?> </h3>



  </div>




  <div id="content">

    <!-- ad -->

    <?php $archive_page_top_ad_code = get_theme_mod( 'archive_page_top_ad', false ); ?>

    <?php if( isset( $archive_page_top_ad_code ) && is_string( $archive_page_top_ad_code ) && strlen( $archive_page_top_ad_code ) > 0 ): ?>

      <div class="page-ad page-desktop-ad ad col-xs-12">

        <label class="ad-label">
          <?php _e( 'ad', 'query' ); ?>
        </label>

        <div class="ad-content">
          <?php echo $archive_page_top_ad_code; ?>
        </div>

      </div>

    <?php endif; ?>


    <?php $archive_page_top_mobile_ad_code = get_theme_mod( 'archive_page_top_mobile_ad', false ); ?>

    <?php if( isset( $archive_page_top_mobile_ad_code ) && is_string( $archive_page_top_mobile_ad_code ) && strlen( $archive_page_top_mobile_ad_code ) > 0 ): ?>


      <div class="page-ad page-mobile-ad col-xs-12">

        <label class="ad-label">
          <?php _e( 'mobile ad', 'query' ); ?>
        </label>

        <div class="ad-content ">
          <?php echo $archive_page_top_mobile_ad_code; ?>
        </div>

      </div>

    <?php endif; ?>

    <!-- ad -->


    <?php $home_style       = get_theme_mod( 'posts_style',   "fullwidth" ); ?>

    <?php $sidebar          =  get_theme_mod( "sidebar_activation", true ); ?>

    <?php $default_class    = ( $sidebar == true ? 'col-md-12 with-sidebar' : 'col-md-10' ); ?>

    <?php $articles_class   = ( $sidebar == true ? 'col-md-8 with-sidebar' : 'col-md-12' ); ?>

    <?php $masonary_class   = ( $sidebar == true ? 'col-md-6 with-sidebar' : 'col-md-4' ); ?>

    <?php $class  = ( $home_style == "masonry" ? $masonary_class : $default_class ); ?>

    <?php set_query_var( 'with-sidebar', $class ); ?>


    <div class="articles col-xs-12 <?php echo $articles_class; ?>">


      <?php if( have_posts() ): ?>



        <?php while( have_posts() ): ?>



          <?php the_post(); ?>



          <?php $id = "post-" . get_the_ID(); ?>



          <?php	get_template_part( "template-parts/post/" . $home_style . "/content", get_post_format() ); ?>


        <?php endwhile; ?>

      <?php endif; ?>



      <div class="old-nav">



        <div class="next" id="next">



          <?php echo get_next_posts_link( '<i class="fas fa-2x fa-angle-left"></i>' ); ?>



        </div> <!-- .next -->



        <div class="previous" id="previous">



          <?php previous_posts_link( '<i class="fas fa-2x fa-angle-right"></i>' ); ?>



        </div> <!-- .previous -->



      </div> <!-- .navigation -->





    </div><!-- .articles -->



    <?php if( $sidebar == true ): ?>

      <aside class="sidebar col-md-4 hidden-sm hidden-xs">

        <?php dynamic_sidebar( 'query-sidebar' ); ?>

      </aside><!-- aside -->

    <?php endif; ?>

        <!-- ad -->

        <?php $archive_page_bottom_ad_code = get_theme_mod( 'archive_page_bottom_ad', false ); ?>

        <?php if( isset( $archive_page_bottom_ad_code ) && is_string( $archive_page_bottom_ad_code ) && strlen( $archive_page_bottom_ad_code ) > 0 ): ?>

          <div class="page-ad page-desktop-ad ad col-xs-12">

            <label class="ad-label">
              <?php _e( 'ad', 'query' ); ?>
            </label>

            <div class="ad-content">
              <?php echo $archive_page_bottom_ad_code; ?>
            </div>

          </div>

        <?php endif; ?>


        <?php $archive_page_bottom_mobile_ad_code = get_theme_mod( 'archive_page_bottom_mobile_ad', false ); ?>

        <?php if( isset( $archive_page_bottom_mobile_ad_code ) && is_string( $archive_page_bottom_mobile_ad_code ) && strlen( $archive_page_bottom_mobile_ad_code ) > 0 ): ?>


          <div class="page-ad page-mobile-ad col-xs-12">

            <label class="ad-label">
              <?php _e( 'mobile ad', 'query' ); ?>
            </label>

            <div class="ad-content ">
              <?php echo $archive_page_bottom_mobile_ad_code; ?>
            </div>

          </div>

        <?php endif; ?>

        <!-- ad -->

  </div><!-- #content -->

  <?php get_footer() ?>

