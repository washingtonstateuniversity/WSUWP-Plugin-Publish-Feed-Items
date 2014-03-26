<?php get_header(); ?>

	<main class="spine-archive-template">

		<?php if ( have_posts() ) : ?>

			<?php get_template_part('parts/headers'); ?>

			<section class="row single recent-articles">
				<h1>Recent WNPA Syndication Items</h1>

				<div class="column one">

					<?php while ( have_posts() ) : the_post();
						$link_url = get_post_meta( get_the_ID(), '_feed_item_link_url', true );
						$link_author = ucwords( strtolower( get_post_meta( get_the_ID(), '_feed_item_author', true ) ) );
						$source_id = get_post_meta( get_the_ID(), '_feed_item_source', true );
						$source = get_post( absint( $source_id ) );
					?>
						<div class="recent-article">
							<h3 class="recent-article-title"><a href="<?php echo esc_url( $link_url ); ?>"><?php the_title(); ?></a></h3>
							<span class="recent-article-date"><?php echo get_the_date(); ?></span>
							<span class="recent-article-author"><?php echo esc_html( $link_author ); ?></span>
							<span class="recent-article-source"><?php echo $source->post_title; ?></span>
							<?php the_excerpt(); ?>
						</div>

					<?php endwhile; ?>

				</div><!--/column-->
				<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> Older posts' ); ?></div>
				<div class="nav-next"><?php previous_posts_link( 'Newer posts <span class="meta-nav">&rarr;</span>' ); ?></div>
			</section>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>