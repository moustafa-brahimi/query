<?php get_header(); ?>

	<div id="content" class="single-content col-xs-12">

	<?php if( have_posts() ): ?>

		<?php while( have_posts() ): ?>

		<?php the_post(); ?>

			<?php get_template_part( 'template-parts/single/single', 'content' ) ?>
		<?php endwhile; ?>

	<?php endif; ?>

	</div><!-- #content -->

<?php get_footer(); ?>

