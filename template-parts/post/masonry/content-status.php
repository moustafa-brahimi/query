<?php $class  = get_query_var( "with-sidebar", 'col-md-4' ) ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class("query-home-post query-status masonry " . $class . " col-xs-12"); ?>>

  <div class="status">


      <h3><?php the_content(); ?></h3>


  </div><!-- .status -->


  <?php get_template_part( 'template-parts/post/info' ); ?>


</article>
<!-- article -->
