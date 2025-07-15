<?php $class = isset($args['with-sidebar']) ? $args['with-sidebar'] : 'col-md-4'; ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post query-image masonry ". esc_attr( $class ) ." col-xs-12 "); ?> data-id='<?php echo get_the_ID(); ?>' data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">


  <?php if( has_post_thumbnail() ): ?>



    <div class="image">


      <?php the_post_thumbnail( 'medium', array( 'title'  => get_the_title() ) ); ?>

      <i class="fas fa-heart middle-heart fa-6x"></i>


    </div><!-- .thumbnail -->



  <?php else: ?>



    <div class="excerpt">



      <?php echo mb_strimwidth( get_the_excerpt(), 0, 200, '...' ); ?>



      <a href="<?php the_permalink() ?>">


        <?php $readmore =  esc_html( get_theme_mod('query_readmore',  __( 'read more', 'query' )) ); ?>



        <?php echo $readmore; ?>



      </a>



    </div>



  <?php endif; ?>



  <?php get_template_part( 'template-parts/post/info' ); ?>




</article>


<!-- article -->

