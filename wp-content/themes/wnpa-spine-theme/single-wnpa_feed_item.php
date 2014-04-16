<?php get_header(); ?>

	<main>

		<?php get_template_part('parts/headers'); ?>

		<section class="row single">

			<div class="column one">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'articles/post' ) ?>

				<?php endwhile; ?>

			</div><!--/column-->

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

<?php get_footer(); ?>