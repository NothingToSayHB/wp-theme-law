<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'link' => array(
		'type'  => 'text',
		'label' => __( 'Link', 'fw' ),
		'value' => '',
		'desc'  => __( 'Choose a link for your slide.', 'fw' )
	),

	'link_title' => array(
		'type'  => 'text',
		'label' => __( 'Link Title', 'fw' ),
		'value' => '',
		'desc'  => __( 'Choose a link text for your slide.', 'fw' )
	),
);

