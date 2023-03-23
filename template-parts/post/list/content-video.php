<?php $class  = get_query_var( "with-sidebar", 'col-md-10' ) ?>


<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post list query-video " . $class . " col-xs-12 "); ?> data-id='<?php  echo get_the_ID(); ?>' data-ajax-url="<?php echo admin_url( 'admin-ajax.php' ) ?>">

  <div class="video">

    <?php $content = do_shortcode( apply_filters('the_content', get_the_content()) ); ?>

    <?php $types = array('video', 'iframe'); ?>

    <?php $media  = get_media_embedded_in_content($content, $types); ?>

    <?php echo $media[0]; ?>

  </div><!-- .video -->

  <div class="content-components">

    <div class="cmp-title" title="<?php the_title(); ?>">

      <a href="<?php the_permalink(); ?>">

        <h3><?php the_title(); ?></h3>

      </a>

    </div><!-- .cmp-title -->

    <div class="cmp-excerpt">

      <?php echo get_words ( get_the_excerpt(),  20 ) . ' ...'; ?>

    </div><!-- .cmp-excerpt -->

    <?php get_template_part( 'template-parts/post/info' ); ?>


  </div><!-- .content-components -->



</article>

<!-- article -->
