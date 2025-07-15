<?php $class = isset($args['with-sidebar']) ? $args['with-sidebar'] : 'col-md-10'; ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post list " . esc_attr( $class ) . " col-xs-12 "); ?> data-id='<?php echo get_the_ID(); ?>' data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">




  <?php if( has_post_thumbnail() ): ?>



    <div class="thumbnail">


      <?php the_post_thumbnail( 'medium' ); ?>

      <i class="fas fa-heart middle-heart fa-6x"></i>


    </div><!-- .thumbnail -->



    <div class="content-components">

      <div class="cmp-title" title="<?php the_title(); ?>">        <a href="<?php the_permalink(); ?>">

          <h3><?php the_title(); ?></h3>

        </a>

      </div><!-- .cmp-title -->      <div class="cmp-excerpt">

        <?php echo query_get_words( get_the_excerpt(), 20 ) . ' ...'; ?>

      </div><!-- .cmp-excerpt -->

      <?php get_template_part( 'template-parts/post/info' ); ?>


    </div><!-- .content-components -->

  <?php else: ?>



    <div class="title" title="<?php the_title(); ?>">

      <a href="<?php the_permalink(); ?>">

        <h3><?php the_title(); ?></h3>

      </a>

    </div><!-- .title -->

    <div class="excerpt">



      <?php the_excerpt(); ?>



      <a href="<?php the_permalink() ?>">


        <?php $readmore =  esc_html(get_theme_mod( 'query_readmore',  __( 'read more', 'query' ) ) ); ?>

        <?php echo $readmore; ?>



      </a>



    </div>


    <?php get_template_part( 'template-parts/post/info' ); ?>


  <?php endif; ?>







</article>


<!-- article -->

