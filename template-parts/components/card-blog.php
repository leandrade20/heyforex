<div class="col-md-4">
  <div class="card-blog" data-aos="fade-up" data-aos-offset="150" data-aos-duration="1000">	
    <a class="post-link" href="<?php the_permalink() ?>">
      <div class="thumbnail">
      <?php 
      $terms = get_the_terms($post, 'category');
      if($terms) :
        echo "<div class='categories'>";
          foreach($terms as $term) : 
            $link = get_term_link($term->term_id);
            echo $term->name ;
          endforeach;
        echo "</div>";
      endif;
    ?>
        <?php 
          $bg = get_field('backup_img', 'option');
          $bg = $bg['url'];
          if( get_the_post_thumbnail_url() ) {
            $bg = get_the_post_thumbnail_url();
          }
        ?>
        <img src="<?php echo $bg ?>" alt="post-img">
        <?php /* <div class="bg" style="background-image: url(<?php echo $bg ?>)"></div> */ ?>
        <div class="date"><?php the_time('d M Y') ?></div>
      </div>
      <div class="post-detail">
        <h5 class="title"><?php the_title(); ?></h5>
        <p><?php the_excerpt(); ?></p>
      </div>
    </a>
  </div>
</div>