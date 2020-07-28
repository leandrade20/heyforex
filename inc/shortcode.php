<?php

function hey_new_crm( $atts ) {
	$atts = shortcode_atts( array(
		'type' => ''
	), $atts );

	$type = $atts['type'];
	if ($type == 'demo') {

		ob_start();

		include(get_template_directory() . '/template-parts/components/demo-form.php');

		$form = ob_get_clean();

		return $form;
	} else {

		ob_start();

		include(get_template_directory() . '/template-parts/components/live-form.php');

		$form = ob_get_clean();

		return $form;
	}
}
add_shortcode( 'hey_crm_forms','hey_new_crm' );