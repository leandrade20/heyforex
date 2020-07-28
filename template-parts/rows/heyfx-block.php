<?php
  // options
  $padding = get_sub_field('section_padding');
  $margin = get_sub_field('section_margin');
  $title = get_sub_field('title');
  $img = get_sub_field('image');
  $img_right = get_sub_field('image_on_right');
  $link_short = get_sub_field('link_shortcode');
  $bg_color = get_sub_field('background_color');
  
  
  $classes = $padding . ' ' . $margin;
?>
<section class="heyfx-block <?= $classes; ?> <?= $bg_color; ?>">
    <div class="container">
    <div class="row align-items-center <?php if( $img_right ) { echo "flex-lg-row-reverse"; } ?>">
    <div class="col-lg-4">
<img data-aos="<?php if( $img_right ) { echo "fade-left"; } else{ echo "fade-right"; }?>" data-aos-offset="300" data-aos-duration="2000" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>"> 
</div>
    <div class="col-lg-8">
    <div class="col-lg-11 <?php if( !$img_right ) { echo "ml-auto"; } ?>">
        <?php if( have_rows('content') ) : ?>
        <div class="content-block">
            <h2 data-aos="<?php if( $img_right ) { echo "fade-right"; } else{ echo "fade-left"; }?>" data-aos-offset="120" data-aos-duration="1000"><?= $title; ?></h2>
            <div class="row">
                <?php while( have_rows('content') ) : the_row(); ?>
                <?php
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $text = get_sub_field('text');
                ?>
                    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-offset="220" data-aos-duration="1000">
                    <?php if( $icon ) {?> <?= $icon; ?> <?php } ?>
                    <h4><?= $title; ?></h4>
                    <?= $text; ?>
                    </div>
                <?php endwhile; ?>
             </div>
             <?php echo do_shortcode($link_short); ?>
        </div>
        <?php endif; ?>
        </div>
    </div>

        </div>
        </div>
        </section>
