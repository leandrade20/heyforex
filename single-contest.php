<?php

get_header(); 

?><?php
$title = get_field('title_single');
$text = get_field('subtitle_single');
$short = get_sub_field('shortcode');
$img = get_field('image_single');
$img_rt = get_field('right_image_single');
$img_lt = get_field('left_image_single');	
?>

<section class="hero hero-inner mb-5">
<img class="hero-left" data-aos="fade-right" data-aos-offset="100" data-aos-duration="1300" data-aos-delay="300" src="<?= $img_lt['url'] ?>" alt="<?= $img_lt['alt'] ?>">
<img class="hero-right" data-aos="fade-left" data-aos-offset="100" data-aos-duration="1300" data-aos-delay="300" src="<?= $img_rt['url'] ?>" alt="<?= $img_rt['alt'] ?>">
<div class="container pb-5">
<div class="row">
<div class="offset-lg-2 col-lg-8">
	  <img class="hero-img smaller ml-auto mr-auto d-table" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0" data-aos-duration="2000" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
			<div class="content text-center" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0" data-aos-duration="2000">
			<h1><?= $title ?></h1>
			<?php if( $text ) { ?>
			<?= $text ?>
			<?php } ?>
			</div>
		</div>
</div>
</div>
</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			get_template_part( 'template-parts/rows' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
