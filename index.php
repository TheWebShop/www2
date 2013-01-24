<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package www2
 * @since www2 1.0
 */
get_header(); 
?>
<?php echo print_r($theme_options); ?>
<div class="container">

	<div class="grid-wrapper">

		<div class="grid  two-thirds">

			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

				<?php if ( have_posts() ) : ?>

					<?php www2_content_nav( 'nav-above' ); ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php www2_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'index' ); ?>

				<?php endif; ?>

				</div><!-- #content .site-content -->
			</div><!-- #primary .content-area -->

		</div><!-- .two-thirds -->

		<div class="grid  one-third">
			<?php get_sidebar(); ?>
		</div><!-- .one-third -->

	</div><!-- .grid-wrapper -->

</div><!-- .container -->

<?php get_footer(); ?>