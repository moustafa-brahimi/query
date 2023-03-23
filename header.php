

<!DOCTYPE html>



<html <?php language_attributes() ?>>



  <head>



    <meta charset="<?php bloginfo("charset"); ?>">



    <meta name="descripiton" content="<?php bloginfo('description'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=0.65">


    <meta name="profile" href="https://gmpg.org/xfn/11">



    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">




    <?php wp_head(); ?>



  </head>



  <body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <div class="container">



      <div class="navtop col-xs-12">


        <?php $logo_actv  =  get_theme_mod( "query_logo_activation",  true ); ?>

          <div class="logo">



            <?php if( function_exists( 'the_custom_logo' ) && !empty( get_theme_mod( 'custom_logo' ) ) && $logo_actv ): ?>



              <?php the_custom_logo(); ?>



            <?php elseif( $logo_actv ): ?>


              <a href="<?php echo esc_attr( home_url() ); ?>">


                <h3 class="no-logo"> <?php echo bloginfo( 'name' ); ?> </h3>


              </a>

            <?php endif; ?>



          </div>

          <!-- .logo -->


        <?php $navbar_actv  =  get_theme_mod( "query_navbar_activation",  true ); ?>

        <?php if( $navbar_actv ): ?>

          <div class="the-list col-md-12 hidden-sm hidden-xs">



            <div class="search-nav-button" id="search-button">



              <button class="search">

                <i class="fas fa-search"></i>

                <i class="fas fa-chevron-left hidden"></i>

              </button>



            </div>



            <!-- search-nav-button -->




            <?php wp_nav_menu([ 
              
              "theme_location" => "navtop",
              "depth" => 3,
              "menu_class" => "desktop-menu menu",
              
              ]); ?>



            <div class="search hidden" id="search-input">



              <?php echo get_search_form(); ?>


              <button class="show-more" id="show-more"><?php _e( 'Show More', 'query' ); ?></button>


            </div>



            <!-- fullscreen-search -->


            <div class="results">

              <i class="fas fa-sync-alt fa-spin fa-3x loading"></i>

              <!-- this is an item to clone it with js -->

              <a href="#">

                <li>

                  <img src="#" />

                  <div class="results-info">

                    <h3></h3>

                    <div class="authority-info">

                      <h5 class="author"> <i class="fas fa-user i"></i></h5>

                      <h5 class="date"> <i class="fas fa-calendar-alt i"></i></h5>

                    </div>

                  </div>

                </li>
              </a>


            </div>


          </div>


          <div class="mobile-list col-xs-12 hidden-lg hidden-md">

            <div class="nav-controls" >

              <button class="menu-control" id="menu-control">

                <i class="open fas fa-bars fa-lg"></i>

                <i class="close fas fa-times fa-lg hidden"></i>


              </button>

              <button class="search-control" id="search-control">

                <i class="fas fa-search fa-lg"></i>

              </button>


              <?php get_search_form(); ?>

            </div>


            <div class="menu-items unactive">

              <?php wp_nav_menu(array("theme_location" => "navtop")); ?>

            </div>

          </div>
          <!-- .the-list -->


        <?php endif; ?>


      </div>

      <!-- .navtop -->

