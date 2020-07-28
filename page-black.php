
<?php
/**
 * Template Name: Black Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package heyfx
 */

get_header(); ?>

	<div id="primary" class="content-area page-black">
		<main id="main" class="site-main">
		
			<?php
				while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/rows' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();