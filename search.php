<?php get_header() ?>

  <div class="archive-page-title">

    <?php if( have_posts() ): ?>

      <h3> <?php wp_title( "" ); ?> </h3>

    <?php else: ?>

      <h3> <?php echo  __( "There's No Results", "query" ) . " : " . get_search_query(); ?> </h3>

      <button id="try-again" class="try-again"> <?php _e( "Try again", "query" ); ?> </button>

    <?php endif; ?>

  </div>

  <div id="content">

    <div class="articles col-xs-12">

    <?php if( have_posts() ): ?>

      <?php while( have_posts() ): ?>

        <?php the_post(); ?>

        <?php $id = "post-" . get_the_ID(); ?>

        <?php	get_template_part( "template-parts/post/fullwidth/content", get_post_format() ); ?>

      <?php endwhile; ?>

    <?php endif; ?>

      <div class="navigation">

        <div class="next" id="next">

        <?php echo get_next_posts_link( '<span class="icon-arrow-left"></span>' ); ?>

      </div> <!-- .next -->

        <div class="previous" id="previous">

        <?php previous_posts_link( '<span class="icon-arrow-right"></span>' ); ?>

      </div> <!-- .previous -->

      </div> <!-- .navigation -->


    </div><!-- .articles -->


  </div><!-- #content -->

  <?php get_footer() ?>
