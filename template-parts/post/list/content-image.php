<?php $class  = get_query_var( "with-sidebar", 'col-md-10' ) ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post query-image list " . $class . " col-xs-12 "); ?> data-id='<?php  echo get_the_ID(); ?>' data-ajax-url="<?php echo admin_url( 'admin-ajax.php' ) ?>">

  <?php if( has_post_thumbnail() ): ?>

    <div class="image">

      <?php the_post_thumbnail( 'large' ); ?>

      <i class="fas fa-heart middle-heart fa-6x"></i>

    </div><!-- .thumbnail -->

  <?php endif; ?>

    <?php get_template_part( 'template-parts/post/info' ); ?>




</article>

<!-- article -->
