<?php $class  = get_query_var( "with-sidebar", 'col-md-10' ); ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post " . $class . " col-xs-12 "); ?> data-id='<?php  echo get_the_ID(); ?>' data-ajax-url="<?php echo admin_url( 'admin-ajax.php' ) ?>">



  <div class="title" title="<?php the_title(); ?>">



    <a href="<?php the_permalink(); ?>">



      <h3><?php the_title(); ?></h3>



    </a>



  </div><!-- .title -->



  <?php if( has_post_thumbnail() ): ?>



    <div class="thumbnail" data-image=''>


      <?php the_post_thumbnail( 'quey-wide-thum' ); ?>

      <i class="fas fa-heart middle-heart fa-6x"></i>


    </div><!-- .thumbnail -->



  <?php else: ?>



    <div class="excerpt">



      <?php the_excerpt(); ?>



      <a href="<?php the_permalink() ?>">


        <?php $readmore =  get_theme_mod( 'query_readmore',  __( 'read more', 'query' ) ); ?>

        <?php echo esc_html( query_empty_content( get_the_content() ) ? __( 'visit post', 'query' )  : $readmore ); ?>


      </a>



    </div>



  <?php endif; ?>



  <?php get_template_part( 'template-parts/post/info' ); ?>




</article>


<!-- article -->

