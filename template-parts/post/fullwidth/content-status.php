<?php $class  = get_query_var( "with-sidebar", 'col-md-10' ); ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class("query-home-post query-status " . $class . " col-xs-12"); ?>>

    <div class="status-author">

      <a href="<?php echo get_author_posts_url( get_the_author_meta("ID") ); ?>">

        <?php echo get_avatar( get_the_author_meta("ID"), 48 ); ?>

      </a>

    </div><!-- .status-author -->


  <div class="status">


      <h3><?php the_content(); ?></h3>


  </div><!-- .status -->

  <?php get_template_part( 'template-parts/post/info' ); ?>



</article>
<!-- article -->
