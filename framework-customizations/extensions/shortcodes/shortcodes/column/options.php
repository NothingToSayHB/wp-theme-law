<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	
	'col_class' => array(
		'label' => __('Column Class', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Column custom class', 'fw' ),
	),

	'col_id' => array(
		'label' => __('Column ID', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Column custom id', 'fw' ),
	),

);