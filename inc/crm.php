<?php

function policies($data) {
  $toc_post = get_post( 497 );
	$risk_post = get_post( 495 );
	$cookie_post = get_post( 471 );
  $respose = [
    'terms_and_conditions' => [ 'content' => $toc_post->post_content, 'title' => $toc_post->post_title],
    'risk_disclosure' => [ 'content' => $risk_post->post_content, 'title' => $risk_post->post_title],
    'gdpr_and_cookie_policy' => [ 'content' => $cookie_post->post_content, 'title' => $cookie_post->post_title],
  ];
  return  new WP_REST_Response( $respose );
}
add_action( 'rest_api_init', function () {
  register_rest_route( 'policies', '/v1', array(
    'methods' => 'GET',
    'callback' => 'policies',
  ) );
} );