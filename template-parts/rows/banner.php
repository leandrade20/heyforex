<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
  $title = get_sub_field('title');
  $img_rt = get_sub_field('image_right');
  $img_lf = get_sub_field('image_left');
  $text = get_sub_field('text');
 
  
  
  $classes = $padding . ' ' . $margin;
?>
<section class="banner <?= $classes; ?>">
<div class="container">
<div class="banner-wrap">
    <img class="banner_abso banner_left" data-aos="fade-right" data-aos-offset="320" data-aos-duration="1500" src="<?= $img_lf['url']; ?>" alt="<?= $img_lf['alt']; ?>">
    <img class="banner_abso banner_right" data-aos="fade-left" data-aos-offset="220" data-aos-duration="1500" src="<?= $img_rt['url']; ?>" alt="<?= $img_rt['alt']; ?>">
    <div class="border-out">
        <div class="border-inner">

        </div>
    </div>
<div class="content" data-aos="fade-up" data-aos-offset="120" data-aos-duration="2000">
    <h2><?= $title; ?></h2>
    <?= $text; ?>
</div>
</div>
</div>
</section>