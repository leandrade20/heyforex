<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
  $title = get_sub_field('title');
  $img = get_sub_field('image');
  $img_right = get_sub_field('image_on_right');
  $link_short = get_sub_field('link_shortcode');
  $green_bg = get_sub_field('green_background');
  
  
  $classes = $padding . ' ' . $margin;
?>
<section class="heyfx-block <?= $classes; ?> <?php if( $green_bg ) { echo "green-bg"; } ?>">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-4">
        <?php if( have_rows('content_left') ) : ?>
        <div class="content-block">
            <div class="row">
                <?php while( have_rows('content_left') ) : the_row(); ?>
                        <?php
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        ?>
                    <div class="col-lg-12 mb-4" data-aos="fade-right" data-aos-offset="220" data-aos-duration="1000">
                    <?php if( $icon ) {?> <?= $icon; ?> <?php } ?>
                    <h4><?= $title; ?></h4>
                    <?= $text; ?>
                    </div>
                <?php endwhile; ?>
             </div>
        </div>
        <?php endif; ?>
    </div>
        <div class="col-lg-4">
        <img class="block-center-img" data-aos="fade-up" data-aos-offset="300" data-aos-duration="2000" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>"> 
        </div>
        <div class="col-lg-4">
        <?php if( have_rows('content_right') ) : ?>
        <div class="content-block">
            <div class="row">
                <?php while( have_rows('content_right') ) : the_row(); ?>
                        <?php
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        ?>
                    <div class="col-lg-12 mb-4" data-aos="fade-left" data-aos-offset="220" data-aos-duration="1000">
                    <?php if( $icon ) {?> <?= $icon; ?> <?php } ?>
                    <h4><?= $title; ?></h4>
                    <?= $text; ?>
                    </div>
                <?php endwhile; ?>
             </div>
        </div>
        <?php endif; ?>
    </div>

        </div>
        </div>
        </section>