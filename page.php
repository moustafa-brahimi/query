<?php get_header(); ?>


	<div id="content" class="page-content col-xs-12">

	<?php if( have_posts() ): ?>



		<?php while( have_posts() ): ?>



			<?php the_post(); ?>



				<article <?php post_class( "query-single-page col-xs-12" ); ?>>



						<?php the_content(); ?>



					</article><!-- article -->

			<?php endwhile; ?>



	<?php endif; ?>

	</div><!-- #content -->

<?php get_footer(); ?>

