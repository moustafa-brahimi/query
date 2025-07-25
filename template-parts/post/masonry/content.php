<?php $class  = get_query_var( "with-sidebar", 'col-md-4' ) ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post masonry " . $class . " col-xs-12 "); ?> data-id='<?php  echo get_the_ID(); ?>' data-ajax-url="<?php echo admin_url( 'admin-ajax.php' ) ?>">



  <div class="title" title="<?php the_title(); ?>">



    <a href="<?php the_permalink(); ?>">



      <h3><?php the_title(); ?></h3>



    </a>



  </div><!-- .title -->



  <?php if( has_post_thumbnail() ): ?>



    <div class="thumbnail" data-image=''>


      <?php the_post_thumbnail( 'medium', array( 'title'  => get_the_title() ) ); ?>

      <i class="fas fa-heart middle-heart fa-6x"></i>


    </div><!-- .thumbnail -->



  <?php else: ?>



    <div class="excerpt">


      <?php // $width = min( mb_strwidth( get_the_excerpt() ), 175 ); ?>

      <?php echo substr( get_the_excerpt(), 0, 175 ); ?>



      <a href="<?php the_permalink() ?>">


        <?php $readmore =  get_theme_mod( 'query_readmore',  __( 'read more', 'query' ) ); ?>



        <?php echo $readmore; ?>



      </a>



    </div>



  <?php endif; ?>



  <?php get_template_part( 'template-parts/post/info' ); ?>




</article>


<!-- article -->

