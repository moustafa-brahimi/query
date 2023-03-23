<?php $class  = get_query_var( "with-sidebar", 'col-md-10' ) ?>


<article id="post-<?php echo get_the_ID(); ?>" <?php post_class("query-home-post list query-status " . $class . " col-xs-12"); ?>>


  <div class="status">


      <h3><?php echo wp_strip_all_tags( get_the_content() ); ?></h3>


  </div><!-- .status -->

  <?php get_template_part( 'template-parts/post/info' ); ?>



</article>
<!-- article -->
