<?php $class = isset($args['with-sidebar']) ? $args['with-sidebar'] : 'col-md-10'; ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post list query-audio " . esc_attr( $class ) . " col-xs-12 "); ?> data-id='<?php echo get_the_ID(); ?>' data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">


  <div class="audio">

    <?php $content = do_shortcode( apply_filters( 'the_content', get_the_content()) ); ?>

    <?php $types = array( 'audio', 'iframe' ); ?>

    <?php $media  = get_media_embedded_in_content($content, $types); ?>

    <?php echo $media[0]; ?>

  </div><!-- .video -->

  <div class="content-components">

    <div class="cmp-title" title="<?php the_title(); ?>">

      <a href="<?php the_permalink(); ?>">

        <h3><?php the_title(); ?></h3>

      </a>

    </div><!-- .cmp-title -->    <div class="cmp-excerpt">
      <?php echo query_get_words( get_the_excerpt(), 20 ) . ' ...'; ?>

    </div><!-- .cmp-excerpt -->

    <?php get_template_part( 'template-parts/post/info' ); ?>


  </div><!-- .content-components -->





</article>


<!-- article -->

