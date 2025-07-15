<?php get_header() ?>



  <div class="author-page-card col-xs-12">





      <?php echo get_avatar( get_the_author_meta( "ID" ), 128 ); ?>





      <div class="informations-side">



        <div>          <h3> <?php echo esc_html( get_the_author_meta( "display_name" ) ); ?> </h3>

          <p> <?php echo esc_html( get_the_author_meta( "description" ) ); ?> </p>



        </div>



      </div>



  </div>


  <?php $home_style       = get_theme_mod( 'posts_style',   "fullwidth" ); ?>

  <?php $sidebar          =  get_theme_mod( "sidebar_activation", true ); ?>

  <?php $default_class    = ( $sidebar == true ? 'col-md-12 with-sidebar' : 'col-md-10' ); ?>

  <?php $articles_class   = ( $sidebar == true ? 'col-md-8 with-sidebar' : 'col-md-12' ); ?>

  <?php $masonary_class   = ( $sidebar == true ? 'col-md-6 with-sidebar' : 'col-md-4' ); ?>
  <?php $class  = ( $home_style == "masonry" ? $masonary_class : $default_class ); ?>

  <div id="content" style="clear:both">

    <div class="articles col-xs-12 <?php echo esc_attr( $articles_class ); ?>">

    <?php if( have_posts() ): ?>

      <?php while( have_posts() ): ?>

        <?php the_post(); ?>

        <?php $id = "post-" . get_the_ID(); ?>

        <?php	get_template_part( "template-parts/post/" . $home_style . "/content", get_post_format(), array( 'with-sidebar' => $class ) ); ?>


      <?php endwhile; endif; ?>



      <div class="navigation">



        <div class="next" id="next">



        <?php echo get_next_posts_link( '<span class="icon-arrow-left"></span>' ); ?>



      </div> <!-- .next -->



        <div class="previous" id="previous">



        <?php previous_posts_link( '<span class="icon-arrow-right"></span>' ); ?>



      </div> <!-- .previous -->



      </div> <!-- .navigation -->



    </div><!-- .articles -->


    <?php if( $sidebar == true ): ?>

      <aside class="sidebar col-md-4 hidden-sm hidden-xs">

        <?php dynamic_sidebar( 'query-sidebar' ); ?>

      </aside><!-- aside -->

    <?php endif; ?>




  </div><!-- #content -->



  <?php get_footer() ?>

