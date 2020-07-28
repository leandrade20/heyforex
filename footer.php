<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package heyfx
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="container">
			<div class="container-fluid">
				<div class="row justify-content-between mt-5 mb-5">
					<div class="col-lg-3">
					<?php $logo = get_field('logo_footer', 'options') ?>	
  <a class="logo" href="<?php echo home_url() ?>">
    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
  </a>
					</div>
					<div class="col-lg-8">
						<div class="row">
						<div class="col-6 col-lg-4 mb-4 mb-lg-0">
							<h5>Trading</h5>
							<?php 
							    wp_nav_menu( array(
									'theme_location' => 'menu-4',
									//'menu_id'        => 'primary-menu',
									'menu_class'		=> 'footer-menu',
									'container'		 => false
								  ) );
								  ?>
						</div>
						<div class="col-6 col-lg-4 mb-4 mb-lg-0">
							<h5>Company</h5>
						<?php 
							    wp_nav_menu( array(
									'theme_location' => 'menu-5',
									//'menu_id'        => 'primary-menu',
									'menu_class'		=> 'footer-menu',
									'container'		 => false
								  ) );
								  ?>
						</div>
						<div class="col-6 col-lg-4">
							<h5>Earn with Us</h5>
						<?php 
							    wp_nav_menu( array(
									'theme_location' => 'menu-6',
									//'menu_id'        => 'primary-menu',
									'menu_class'		=> 'footer-menu',
									'container'		 => false
								  ) );
								  ?>
						</div>
								<div class="col-6 col-lg-4 d-block d-lg-none">
								<?= heyfx_social_function(); ?>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
	<div class="footer-below">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 d-flex align-items-center">
				<div class="copy d-table">&copy; <?php echo date('Y'); ?> Hey Forex</div>
				<?php 
							    wp_nav_menu( array(
									'theme_location' => 'menu-7',
									//'menu_id'        => 'primary-menu',
									'menu_class'		=> 'd-flex',
									'container'		 => false
								  ) );
								  ?>
				</div>
				<div class="col-lg-4 d-none d-lg-block">
				<?= heyfx_social_function(); ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
