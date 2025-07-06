<?php $class  = get_query_var( "with-sidebar", 'col-md-10' ); ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class("query-home-post query-image " . $class . " col-xs-12"); ?> data-id='<?php  echo get_the_ID(); ?>' data-ajax-url="<?php echo admin_url( 'admin-ajax.php' ) ?>">



  <?php if( has_post_thumbnail() ): ?>



    <div title="<?php the_title(); ?>"  class="image">


      <?php the_post_thumbnail(); ?>

      <i class="fas fa-heart middle-heart fa-6x"></i>


    </div><!-- .thumbnail -->

    <h4><?php the_title(); ?></h4>



  <?php else: ?>

    
  <div class="title" title="<?php the_title(); ?>">
    <a href="<?php the_permalink(); ?>">
      <h3><?php the_title(); ?></h3>
    </a>
  </div><!-- .title -->


    <div class="post-image">

      <?php the_content(); ?>

    </div>



  <?php endif; ?>




  <?php @get_template_part( 'template-parts/post/info' ); ?>




</article>

<!-- article -->

