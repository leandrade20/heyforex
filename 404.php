<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package heyfx
 */

get_header(); 
$title = get_field('title_thank', 'options');
$img_rt = get_field('right_image_thank', 'options');
$img_lf = get_field('left_image_thank', 'options');
$text = get_field('text_thank', 'options');

?>

	<div id="primary" class="content-area page-black">
		<main id="main" class="site-main">
		<img class="banner_abso banner_left" src="<?= $img_lf['url']; ?>" alt="<?= $img_lf['alt']; ?>">
    <img class="banner_abso banner_right"  src="<?= $img_rt['url']; ?>" alt="<?= $img_rt['alt']; ?>">
			<div class="container padding-max" data-aos="fade-up" data-aos-offset="120" data-aos-duration="1500">
				<h1><?= $title; ?></h1>
				<?= $text; ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
