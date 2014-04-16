<?php get_header(); ?>

	<main>

		<?php get_template_part('parts/headers'); ?>

		<section class="row single">

			<div class="column one">

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<header class="article-header">
							<hgroup>
								<?php if ( is_single() ) : ?>
									<h1 class="article-title"><?php the_title(); ?></h1>
								<?php else : ?>
									<h2 class="article-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
									</h2>
								<?php endif; // is_single() or in_a_relationship() ?>
							</hgroup>
							<hgroup class="source">
								<?php
								// Published on
								/* $year = get_the_date('Y'); $day = get_the_date('j'); $month = get_the_date('F');
								echo '<time class="article-date" datetime="'.get_the_date( 'c' ).'">';
								echo '	<span class="month">'.$month.'</span>';
								echo '	<span class="day">'.$day.'</span>';
								echo '	<span class="year">'.$year.'</span>';
								echo '</time>'; */
								echo '<time class="article-date" datetime="'.get_the_date( 'c' ).'">';
								echo the_date();
								echo '</time>';

								// Published by
								$author = get_the_author();
								$author_articles = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
								echo '<cite class="article-author" role="author"><a href="'.$author_articles.'">'.$author.'</a></cite>';
								?>
							</hgroup>
						</header>

						<div class="article-body">
							<?php if ( has_post_thumbnail()) : ?>
								<figure class="article-thumbnail"><?php the_post_thumbnail(array(132,132,true)); ?></figure>
							<?php endif; ?>
							<?php the_content(); ?>
							<div class="clear"></div>
						</div>

						<footer class="article-footer">

							<?php

							// Categorized In...
							if ( has_category()) {
								echo '<dl class="categorized">';
								echo '<dt>Categorized</dt>';
								foreach((get_the_category()) as $category) {
									echo '<dd><a href="'.get_category_link($category->cat_ID).'">' . $category->cat_name . '</a></dd>';
								}
								echo '</dl>';
							}
							// Tagged As...
							if ( has_tag()) {
								echo '<dl class="tagged">';
								echo '<dt>Tagged</dt>';
								foreach((get_the_tags()) as $tag) {
									echo '<dd><a href="'.get_tag_link($tag->term_id).'">' . $tag->name . '</a></dd>';
								}
								echo '</dl>';
							}

							// User Can Edit
							if ( current_user_can('edit_post', $post->ID) && is_singular() ) {
								echo '<dl class="editors">';
								edit_post_link('Edit', '<span class="edit-link">', '</span>' );
								echo '</dl>';
							}
							?>

						</footer><!-- .entry-meta -->

					</article>

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