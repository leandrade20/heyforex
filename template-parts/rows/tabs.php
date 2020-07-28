<?php
	$padding = get_sub_field('section_padding');
    $margin = get_sub_field('section_margin');
    $title_main = get_sub_field('title_main');
    
	// $section_title = get_sub_field('section_title');
?>


<section class="product_tab <?= $padding . ' ' . $margin; ?>">
	<div class="container">
        <h2  data-aos="fade-right" data-aos-offset="220" data-aos-duration="1000" ><?= $title_main; ?></h2>
            <div class="row">

		
        <?php if( have_rows('tabs_content') ) : $i = 0; ?>
        <div class="responsive-tabs"  data-aos="fade-up" data-aos-offset="220" data-aos-duration="2000">
    <ul class="nav nav-tabs" role="tablist">
                <?php while( have_rows('tabs_content') ) : the_row(); $i++;?>
                <?php  
                $title_tab = get_sub_field('title_tab');
                ?>
                

        <li role="presentation" class="<?php if ($i == 1){ echo 'active';}?>">
            <a href="#tab<?= $i;?>" aria-controls="tab<?= $i;?>" role="tab" data-toggle="tab">
                 <p><?= $title_tab; ?></p>
            </a>
        </li>
        <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    
        <?php if( have_rows('tabs_content') ) : $i = 0; ?>
        <div id="tabs-content" class="tab-content panel-group">
 
                <?php while( have_rows('tabs_content') ) : the_row(); $i++;
                $img = get_sub_field('icon_image');
                $title_tab = get_sub_field('title_tab');
                $content = get_sub_field('content');
                ?>
                <div class="panel-heading" role="tab" id="heading<?= $i;?>">
            <a href="#tab<?= $i;?>" class="" role="button" data-toggle="collapse" data-parent="tabs-content" aria-expanded="true"
               aria-controls="tab<?= $i;?>"><?= $title_tab; ?> <i class="uil uil-arrow-down"></i></a>
        </div>

        <div id="tab<?= $i;?>" role="tabpanel" class="tab-pane panel-collapse collapse <?php if ($i == 1){ echo 'in';}?> 
        <?php if ($i == 1){ echo 'active';}?> "  aria-labelledby="heading<?= $i;?>">
                 <div class="row">
                     <div class="col-lg-2">
                         <img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
                     </div>
                        <?php if( have_rows('content_tab_inner') ) : ?>
                           

                <?php while( have_rows('content_tab_inner') ) : the_row(); 
            $title = get_sub_field('title_inner');
            $text = get_sub_field('text_inner');
                ?>
                 <div class="col-lg-5">
                    <h4><?= $title; ?></h4>
                    <?= $text; ?>
                    </div>
                    <?php endwhile; ?>
                       
        <?php endif; ?>
        </div>
        </div>


                <?php endwhile; ?>
</div>
		<?php endif; ?>

        </div>
	</div>
</section>