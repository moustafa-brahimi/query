  <div id="footer">


    <?php $copyrights                 =   get_theme_mod( 'copyrights_sentence', __( 'All Copyrights Reserved', 'query' ) ); ?>

    <?php $social_buttons_activation  =   get_theme_mod( 'socialmedia_buttons_activation', true ); ?>

    <?php $description_activation     =   get_theme_mod( 'footer_desctription_activation', true ); ?>

    <?php if( $description_activation OR $social_buttons_activation ): ?>

      <header class="col-xs-12">



        <div class="header-content">


          <?php $social_media_menu_info   = get_nav_menu_locations(); ?>

          
          <?php if( $social_buttons_activation && array_key_exists( 'query-social-media', $social_media_menu_info ) ): ?>
            
            <div class="social-icons">
              
              <?php $social_media_menu_items  = wp_get_nav_menu_items( $social_media_menu_info['query-social-media'] ); ?>

              <?php if( !empty( $social_media_menu_items ) ): ?>


              <?php foreach ( $social_media_menu_items as $item ): ?>




                  <a target="_blank" href="<?php echo $item->url; ?>">

                    <div class="social-bt" title=" <?php echo $item->post_title; ?> ">




                        <i class="fab fa-<?php echo $item->post_title; ?> i fa-sm fa-fw"></i>



                    </div><!-- .social-bt -->

                  </a>



              <?php endforeach; ?>


            <?php endif; ?>
            </div>

            <!-- .social-icons -->

          <?php endif; ?>

          <?php if( $description_activation ): ?>

            <p> <?php echo bloginfo('description'); ?> </p>


          <?php endif; ?>

        </div>



      </header>


    <?php endif; ?>


    <?php if( !empty( $copyrights ) ): ?>

      <footer class="col-xs-12">



        <p> <?php echo $copyrights; ?> </p>



      </footer>


    <?php  endif; ?>


  </div>






</div>

<!-- .container -->



<?php wp_footer(); ?>


</body>


</html>


