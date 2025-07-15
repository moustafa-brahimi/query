<?php $class = isset($args['with-sidebar']) ? $args['with-sidebar'] : 'col-md-10'; ?>


<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(" query-home-post list query-gallery ". esc_attr( $class ) ." col-xs-12"); ?> data-id='<?php echo get_the_ID(); ?>'>





    <?php $args = array( 'post_type' => 'attachment', "posts_per_page" => 6, "post_parent" => get_the_ID() ); ?>



    <?php $attachments = get_posts( $args ); ?>


    <?php $i = 0; ?>



    <div class="gallery">



      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">



        <!-- Wrapper for slides -->



        <div class="carousel-inner" role="listbox">



        <?php foreach( $attachments as $attachment ): ?>



          <?php $src =  wp_get_attachment_image_src( $attachment->ID, "large" ); ?>



          <?php $active = ($i == 0 ? "active" : ""); ?>          <div class="item <?php echo esc_attr( $active ); ?>">

            <div class="image" style="background-image:url('<?php echo esc_url( $src[0] ); ?>')">>



            </div>



          </div> <!-- .item -->



        <?php $i++; ?>


query_get_words
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


    <div class="content-components">

      <div class="cmp-title" title="<?php the_title(); ?>">

        <a href="<?php the_permalink(); ?>">

          <h3><?php the_title(); ?></h3>

        </a>

      </div><!-- .cmp-title -->      <div class="cmp-excerpt">

        <?php echo query_get_words( get_the_excerpt(), 20 ) . ' ...'; ?>

      </div><!-- .cmp-excerpt -->

      <?php get_template_part( 'template-parts/post/info' ); ?>


    </div><!-- .content-components -->






</article>

<!-- article -->

