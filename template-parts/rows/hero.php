<?php
    $title = get_sub_field('title');
    $text = get_sub_field('text');
	$short = get_sub_field('shortcode');
    $img = get_sub_field('image');
    $img_rt = get_sub_field('image_right');
    $img_lt = get_sub_field('image_left');	
    $middle = get_sub_field('image_and_content_in_the_middle');
    $above = get_sub_field('text_above_image');
    
?>

<section class="hero hero-inner <?php if( $above ) { echo "text-above"; } ?>">
<img class="hero-left" data-aos="fade-right" data-aos-offset="100" data-aos-duration="1600" data-aos-delay="400" src="<?= $img_lt['url'] ?>" alt="<?= $img_lt['alt'] ?>">
<img class="hero-right" data-aos="fade-left" data-aos-offset="100" data-aos-duration="1600" data-aos-delay="400" src="<?= $img_rt['url'] ?>" alt="<?= $img_rt['alt'] ?>">
<?php if( !$middle ) { ?>  
<div class="container">
    <div class="row align-items-center">
    <div class="col-lg-5">
          <img class="hero-img" data-aos="fade-up" data-aos-delay="300" data-aos-offset="0" data-aos-duration="2000" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
    </div>
    <div class="col-lg-7">
        <div class="col-lg-10">
            <div class="content" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0" data-aos-duration="2000">
            <h1><?= $title ?></h1>
            <?php if( $text ) { ?>
            <?= $text ?>
            <?php } ?>
            </div>
        </div>
    </div>
    </div>
</div>
<?php } 
else { ?> 
<div class="container pb-5">
    <div class="row">
    <div class="offset-lg-2 col-lg-8">
    <?php if( !$above ) { ?> 
          <img class="hero-img smaller ml-auto mr-auto d-table" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0" data-aos-duration="2000" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
                <div class="content text-center" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0" data-aos-duration="2000">
                <h1><?= $title ?></h1>
                <?php if( $text ) { ?>
                <?= $text ?>
                <?php } ?>
                </div>
                <?php } 
        else { ?> 
                        <div class="content text-center" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0" data-aos-duration="2000">
                <h1><?= $title ?></h1>
                <?php if( $text ) { ?>
                <?= $text ?>
                <?php } ?>
                </div>
             <img class="hero-img smaller ml-auto mr-auto d-table" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0" data-aos-duration="2000" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
             <?php } ?>
            </div>
    </div>
</div>
<?php } ?> 
<div class="sticky">
<?php echo do_shortcode($short); ?>
</div>
<?php /*
<div class="float-header fixed">
<?php echo do_shortcode($short); ?>
*/ ?>
</div>
</section>