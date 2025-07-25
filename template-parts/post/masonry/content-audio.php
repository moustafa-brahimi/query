<?php $class  = get_query_var( "with-sidebar", 'col-md-4' ) ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class( "query-home-post masonry query-audio  " . $class . " col-xs-12" ); ?> data-id='<?php  echo get_the_ID(); ?>' data-ajax-url="<?php admin_url( 'admin-ajax.php' ) ?>">

  <div class="title" title="<?php the_title(); ?>">

    <a href="<?php the_permalink(); ?>">

      <h3><?php the_title(); ?></h3>

    </a>

  </div><!-- .title -->

    <div class="audio">

      <?php $content = do_shortcode( apply_filters('the_content', get_the_content()) ); ?>

      <?php $types = array('audio', 'iframe'); ?>

      <?php $media  = @get_media_embedded_in_content($content, $types); ?>

      <?php  if(  !empty( $media[0] ) ): echo $media[0]; endif; ?>

    </div><!-- .audio -->

    <?php get_template_part( 'template-parts/post/info' ); ?>


</article>

<!-- article -->
