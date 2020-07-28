<?php
	$title = get_sub_field('title');
	$short = get_sub_field('shortcode');
    $img = get_sub_field('image');
    $text_arrow = get_sub_field('text_arrow');
    $img_arrow = get_sub_field('image_arrow');
	
?>

<section class="hero hero-home d-none w-100 d-lg-table desktop">
    <div class="container">
    <div class="row h-100">
    <img data-aos="fade-left" data-aos-duration="1300" data-aos-delay="300" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
    <div class="col-lg-7 d-flex align-items-center">
            <div class="center-height mb-5">
            <?php if( have_rows('subtitles') ) : ?>

                <div class="subtitle-wrap d-flex <?= $vert_align; ?>">

                    <?php while( have_rows('subtitles') ) : the_row(); ?>
                    <?php
                        $sub_text = get_sub_field('text');
                    ?>
                        <p class="mr-4" data-aos="fade-right" data-aos-duration="1300" data-aos-delay="300"><?= $sub_text; ?></p>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <h1 data-aos="fade-zoom-in" data-aos-delay="400" data-aos-offset="0" data-aos-duration="2000"><?= $title ?></h1>
        <?php echo do_shortcode($short); ?>
    </div>
    </div>

</div>
<div class="arrow_below" data-aos="fade-left" data-aos-duration="1300" data-aos-delay="100" data-aos-offset="0">
<p><?= $text_arrow ?></p>
<img src="<?= $img_arrow['url'] ?>" alt="<?= $img_arrow['alt'] ?>">
</div>
</div>
<div class="sticky">
<?php get_template_part( 'template-parts/components/live-form' ); ?>
</div>

</section>

<section class="hero hero-home d-table w-100 d-lg-none mobile">
    <div class="container">
    <div class="row">
    <h1 data-aos="fade-zoom-in" data-aos-delay="400" data-aos-offset="0" data-aos-duration="2000"><?= $title ?></h1>
            </div>
            </div>
    <?php get_template_part( 'template-parts/components/live-form' ); ?>
    <div class="container">
    <div class="row">
    <img class="mobile" style="position: relative; display: table; width: 80%; margin: 2rem auto;" data-aos="fade-left" data-aos-duration="1300" data-aos-delay="0" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
    <div class="col-lg-7">
   
            <?php if( have_rows('subtitles') ) : ?>

                <div class="subtitle-wrap d-flex mb-4 <?= $vert_align; ?>">

                    <?php while( have_rows('subtitles') ) : the_row(); ?>
                    <?php
                        $sub_text = get_sub_field('text');
                    ?>
                        <p class="mr-4" data-aos="fade-right" data-aos-duration="1300" data-aos-delay="100"><?= $sub_text; ?></p>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        
        <?php echo do_shortcode($short); ?>
    </div>


</div>

</div>

</section>