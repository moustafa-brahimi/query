
<?php $post_author      =   get_theme_mod( 'post_author', true ); ?>

<?php $post_categories  =   get_theme_mod( 'post_categories', true ); ?>

<?php $post_comments    =   get_theme_mod( 'post_comments', true ); ?>

<?php $post_tags        =   get_theme_mod( 'post_tags', true ); ?>

<?php $class = ( $post_author || $post_categories || $post_comments || $post_tags ? 'col-md-8' : 'col-md-12' ); ?>

<!-- [ AD ] -->

<?php $single_post_ad_code = get_theme_mod( 'single_post_ad', false ); ?>

<?php if( isset( $single_post_ad_code ) && is_string( $single_post_ad_code ) && strlen( $single_post_ad_code ) > 0 ): ?>


  <div class="page-ad page-desktop-ad ad col-xs-12">

	<label class="ad-label">
	  <?php _e( 'ad', 'query' ); ?>
	</label>

	<div class="ad-content ">
	  <?php echo $single_post_ad_code; ?>
	</div>

  </div>

<?php endif; ?>


	<?php $single_post_mobile_ad_code = get_theme_mod( 'single_post_mobile_ad', false ); ?>

	<?php if( isset( $single_post_mobile_ad_code ) && is_string( $single_post_mobile_ad_code ) && strlen( $single_post_mobile_ad_code ) > 0 ): ?>


	<div class="page-ad page-mobile-ad col-xs-12">

		<label class="ad-label">
		<?php _e( 'mobile ad', 'query' ); ?>
		</label>

		<div class="ad-content ">
		<?php echo $single_post_mobile_ad_code; ?>
		</div>

	</div>

	<?php endif; ?>

<!-- [ AD ] -->

<article <?php post_class( "query-single-post col-xs-12 " . $class  ); ?>>

    <h2><?php the_title(); ?></h2>

    <?php the_post_thumbnail( 'large', array( 'class' => "thumbnail" ) ) ?>

    <div class="post-content">

      <?php the_content(); ?>

      <?php 
        wp_link_pages(
          array(
            'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'query' ) . '">',
            'after'    => '</nav>',
            /* translators: %: Page number. */
            'pagelink' => esc_html__( 'Page %', 'query' ),
          )
        );

    ?>

    </div>

</article><!-- article -->


    <aside class="sidebar col-xs-12 col-md-4">

      <?php if( $post_author ): ?>

        <div class="item author col-xs-12">



          <h3 class="item-title">



            <?php echo get_the_author_meta( "display_name" ); ?>



          </h3> <!-- .item-title -->



          <?php $id = get_the_author_meta("ID"); ?>



          <div class="item-content">



            <p class="description">



              <a href="<?php echo get_author_posts_url( $id ); ?>">



                <?php echo get_avatar( $id, 48 ); ?>



              </a>



              <br>


              <?php if( !empty( get_the_author_meta( "description" ) ) ): ?>


                <?php echo get_the_author_meta("description"); ?>


              <?php else: ?>


                <?php if( get_current_user_id() == $id ): ?>

                  <a href="<?php echo get_edit_user_link( $id ) . "#description"; ?>">

                    <?php _e( "Add Description", "query" ); ?>

                  </a>

                <?php endif; ?>

              <?php endif; ?>

            </p><!-- .description -->



          </div><!-- .item-content -->



        </div><!-- .item -->

      <?php endif; ?>

      <?php $ad_code = get_theme_mod( 'single_post_sidebar_ad', false ); ?>

      <?php if( isset( $ad_code ) && is_string( $ad_code ) && strlen( $ad_code ) > 0 ): ?>
        

        <div class="item ad col-xs-12">

          <h3 class="item-title">
            <?php _e( 'ad', 'query' ); ?>
          </h3> <!-- .item-title -->

          <div class="item-content ">
            <?php echo $ad_code; ?>
          </div><!-- .item-content -->

          </div><!-- .item -->

      <?php endif; ?>

      <?php $mobile_ad_code = get_theme_mod( 'single_post_sidebar_mobile_ad', false ); ?>

      <?php if( isset( $mobile_ad_code ) && is_string( $mobile_ad_code ) && strlen( $mobile_ad_code ) > 0 ): ?>
        
        <div class="item mobile-ad col-xs-12">

          <h3 class="item-title">
            <?php _e( 'mobile ad', 'query' ); ?>
          </h3> <!-- .item-title -->

          <div class="item-content ">
            <?php echo $mobile_ad_code; ?>
          </div><!-- .item-content -->

          </div><!-- .item -->

      <?php endif; ?>



      <?php if( $post_categories ): ?>

        <div class="item categories col-xs-12">



          <h3 class="item-title">



            <?php _e( "categories", "query" ); ?>



          </h3> <!-- .item-title -->



          <div class="item-content">



            <?php $categories = wp_get_post_categories( get_the_ID() ); ?>



            <ul>



              <?php foreach ( $categories as $category ): ?>



                <li>



                  <a href="<?php echo get_category_link( $category ); ?>">



                    <?php echo get_cat_name( $category ); ?>



                  </a>



                </li>



              <?php endforeach; ?>



            </ul>



          </div><!-- .item-content -->



        </div><!-- .item -->

      <?php endif; ?>

      <?php if( $post_comments ): ?>

        <div class="item comment-form col-xs-12" id="comment-form">



          <h3 class="item-title">



            <?php _e( "add comment", "query" ); ?>



          </h3> <!-- .item-title -->



          <div class="item-content">



            <?php if( comments_open() ): ?>



              <?php $comments_args = array(	'title_reply' 	=> ""); ?>



              <?php comment_form( $comments_args ); ?>



            <?php else: ?>



              <p><?php _e( 'the comment option\'s closed !', "query" ); ?></p>



            <?php endif; ?>



          </div><!-- .item-content -->



        </div><!-- .item -->

        <div class="item comments col-xs-12" id="all-comments">



          <h3 class="item-title">



            <?php _e( "all comments", "query" ); ?>



          </h3> <!-- .item-title -->



          <div class="item-content">



            <?php if( comments_open() ): ?>



              <?php if( !empty( get_comments_number() ) ): ?>



                <?php @comments_template(); ?>



              <?php else: ?>



                  <button class="go-to-form" id="go-to-form"> <?php _e( "there's no comments be the first", "query" ); ?></button>



              <?php endif; ?>



            <?php else: ?>



              <p><?php _e( 'the comment option\'s closed !', "query" ); ?></p>



            <?php endif; ?>



          </div><!-- .item-content -->



        </div><!-- .item -->

      <?php endif; ?>

      <?php $tags = wp_get_post_tags( $post->ID ); ?>

      <?php if ( !empty( $tags ) && $post_tags ): ?>

        <div class="item tags col-xs-12" id="tags">

          <h3 class="item-title">

            <?php _e( "tags", "query" ); ?>

          </h3> <!-- .item-title -->

          <div class="item-content">

            <ul>

              <?php foreach ($tags as $tag): ?>

                <li>

                  <a href="<?php echo get_tag_link( $tag->term_id ); ?>">

                    <?php echo $tag->name; ?>

                  </a>

                </li>

              <?php endforeach; ?>

            </ul>

          </div><!-- .item-content -->

        </div><!-- .item -->

      <?php endif; ?>



    </aside><!-- aside -->
