<?php $class  = get_query_var( "with-sidebar", 'col-md-4' ) ?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post masonry " . $class . " col-xs-12 "); ?> data-id='<?php  echo get_the_ID(); ?>' data-ajax-url="<?php echo admin_url( 'admin-ajax.php' ) ?>">



  <div class="title" title="<?php the_title(); ?>">



    <a href="<?php the_permalink(); ?>">



      <h3><?php the_title(); ?></h3>



    </a>



  </div><!-- .title -->




  <?php $args = array( 'post_type' => 'attachment', "posts_per_page" => 6, "post_parent" => get_the_ID() ); ?>

  <?php $attachments = get_posts( $args ); ?>

  <?php $i = 0; ?>


  <?php if( !empty( $attachments ) ): ?>



    <div class="gallery">



      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">



        <!-- Wrapper for slides -->



        <div class="carousel-inner" role="listbox">



        <?php foreach( $attachments as $attachment ): ?>



          <?php $src =  wp_get_attachment_image_src( $attachment->ID, "large" ); ?>



          <?php $active = ($i == 0 ? "active" : ""); ?>



          <div class="item <?php echo $active; ?>">



            <div class="image" style="background-image:url('<?php echo $src[0]; ?>')">



            </div>



          </div> <!-- .item -->



        <?php $i++; ?>



        <?php endforeach; ?>



        </div>



        <!-- Controls -->



        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

          <span class="fas fa-angle-left fa-lg" aria-hidden="true"></span>

        </a>



        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

          <span class="fas fa-angle-right fa-lg" aria-hidden="true"></span>

        </a>



      </div>



    </div><!-- .gallery -->



  <?php else: ?>



    <div class="excerpt">



      <?php echo mb_strimwidth( get_the_excerpt(), 0, 175, '...' ); ?>



      <a href="<?php the_permalink() ?>">

        <?php $readmore =  esc_html( get_theme_mod('query_readmore',  __( 'read more', 'query' )) ); ?>
        <?php echo $readmore; ?>

      </a>



    </div>



  <?php endif; ?>



  <?php get_template_part( 'template-parts/post/info' ); ?>




</article>


<!-- article -->

