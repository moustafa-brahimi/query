
<div class="query-latest-posts col-xs-12" id="query-latest-posts">

    <?php $latestposts_style  =  get_theme_mod( 'query_latestposts_style', 'close' ); ?>

    <?php $latestposts_category = get_theme_mod( 'slider_categorie', false ); ?>

    <?php # set query variables ?>

    <?php $args   = array( 
      
      'post_type' => 'post',
      'posts_per_page' => 4,
      'meta_query' => array( array( 'key' => '_thumbnail_id' ) ),
      'ignore_sticky_posts' => true,
      'tax_query' => array(

        array(  
          'taxonomy' => 'post_format',
          'field' => 'slug',
          'terms' => array(
            
            'post-format-audio',
            'post-format-image',
            'post-format-status'
          ),

          'operator'  => 'NOT IN'
          
        ) 
        
      ) 
      
    ); ?>

    <?php if( isset( $latestposts_category ) && is_string( $latestposts_category ) && strlen( $latestposts_category ) > 0 && $latestposts_category !== '*' ): ?>

      <?php $args[ 'category_name' ] = $latestposts_category; ?>

    <?php endif; ?>


    <?php $query  = new WP_QUERY($args); ?>


    <?php $i = 1; ?>



    <?php if( $query->have_posts() ): ?>



      <?php while( $query->have_posts() ): ?>



        <?php $query ->the_post(); ?>


          <?php 
          
          switch( $i ):

              case 1: $thumbnail_size = "query-slider-big-post"; break;

              case 4: $thumbnail_size = "quey-wide-thum"; break;
              
              default: $thumbnail_size = "query-slider-small-post"; break;

          endswitch; ?>


          <?php $class = ( $i == 1  ? "col-lg-6" : "col-lg-3" ); ?>



          <?php $class = ( $i == 4 ? "col-lg-6" : $class ); ?>




          <?php $url = get_the_post_thumbnail_url( get_the_id(), $thumbnail_size ); ?>



          <?php $i++; ?>



          <article id="<?php echo $id; ?>" <?php post_class("item " . $class . " col-xs-12"); ?> style="background-image:url('<?php echo $url; ?>');">


            <div class="latest-content">



              <?php $post_category =  get_the_category()[0]; ?>


              <div class="small-category">



                <a href="<?php echo get_category_link($post_category->cat_ID); ?>">



                  <?php echo $post_category->cat_name; ?>



                </a>



              </div>



              <div class="title">



                <a href="<?php the_permalink(); ?>">





                  <h3> <?php the_title(); ?> </h3>



                </a>



              </div>



            </div>


            <div class="front <?php echo $latestposts_style; ?>" style="background-image:url('<?php echo $url; ?>');"></div>


          </article>


          <!-- article -->


          <?php wp_reset_postdata(); ?>
          
          <?php endwhile; ?>
          

    <?php endif; ?>


</div>
<!-- .query-latest-posts -->
