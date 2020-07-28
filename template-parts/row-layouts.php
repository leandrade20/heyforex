<?php 
// rows
while (have_rows('rows')) {
  the_row();

  if( get_row_layout() === 'columns' ) {
    get_template_part( 'template-parts/rows/columns' );
  } elseif( get_row_layout() === 'cta' ) {
    get_template_part( 'template-parts/rows/ctas' );
  } elseif( get_row_layout() === 'blog' ) {
    get_template_part( 'template-parts/rows/blog' );
  } elseif( get_row_layout() === 'hero_home' ) {
    get_template_part( 'template-parts/rows/hero-home' );
  } elseif( get_row_layout() === 'heyfx_block' ) {
    get_template_part( 'template-parts/rows/heyfx-block' );
  } elseif( get_row_layout() === 'heyfx_block_center' ) {
    get_template_part( 'template-parts/rows/heyfx-block-center' );
  } elseif( get_row_layout() === 'banner' ) {
    get_template_part( 'template-parts/rows/banner' );
  } elseif( get_row_layout() === 'hero' ) {
    get_template_part( 'template-parts/rows/hero' );
  } elseif( get_row_layout() === 'tabs' ) {
    get_template_part( 'template-parts/rows/tabs' );
  } elseif( get_row_layout() === 'contest' ) {
    get_template_part( 'template-parts/rows/contest' );
  }


  
}