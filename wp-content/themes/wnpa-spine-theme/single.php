<?php

get_header();

?>

	<main>

		<?php get_template_part('parts/headers'); ?>

		<section class="row sidebar">

			<div class="column one">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'articles/post' ) ?>

					<?php // get_comments( ); ?>

				<?php endwhile; ?>

			</div><!--/column-->

			<div class="column two">

				<?php get_sidebar(); ?>

			</div><!--/column two-->

		</section>

		<footer>
			<section class="row halves pager">
				<div class="column one">
					<?php previous_post_link(); ?>
				</div>
				<div class="column two">
					<?php next_post_link(); ?>
				</div>
			</section><!--pager-->
		</footer>

	</main><!--/#page-->

	<a href="<?php echo get_edit_post_link(); ?>" class="wp-edit-link">Edit</a>

<?php get_footer(); ?>