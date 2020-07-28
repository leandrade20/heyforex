<div class="container">
  <div class="logo-menu d-flex">
  <?php $logo = get_field('logo', 'options') ?>	
  <a class="logo" href="<?php echo home_url() ?>">
    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
  </a>

  <?php
    wp_nav_menu( array(
      'theme_location' => 'menu-1',
      //'menu_id'        => 'primary-menu',
      'menu_class'		=> 'd-none d-xl-flex primary-menu align-items-center',
      'container'		 => false
    ) );
    ?>
  </div>

  <div class="second-menu h-100">
  <?php
    wp_nav_menu( array(
      'theme_location' => 'menu-2',
      //'menu_id'        => 'primary-menu',
      'menu_class'		=> 'mobile-change primary-menu h-100 align-items-center',
      'container'		 => false
    ) );
    ?>
  </div>


  <button class="mobile-menu-toggle hamburger hamburger--collapse d-xl-none" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button> 
</div>