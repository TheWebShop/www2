<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package www2
 * @since www2 1.0
 */

get_header(); ?>

<div class="container">

	<div class="grid-wrapper">

		<div class="grid  two-thirds">
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'page' ); ?>

						<?php /*comments_template( '', true );*/ ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #content .site-content -->
			</div><!-- #primary .content-area -->
		</div>

		<div class="grid  one-third">
			<?php get_sidebar(); ?>
		</div>

	</div><!-- .grid-wrapper -->

</div><!-- .container -->

<?php get_footer(); ?>