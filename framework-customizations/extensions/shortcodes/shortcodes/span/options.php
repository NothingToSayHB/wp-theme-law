<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'span_icon'       => array(
		'type' => 'icon',
		'label' => __( 'Span Icon', 'fw' )
	),

	'span_wrapper'       => array(
		'type' => 'checkbox',
		'label' => __( 'Wrap in div', 'fw' ),
		'text' => ''
	),

	'span_wrapper_class'       => array(
		'type' => 'text',
		'label' => __( 'Wrap Class', 'fw' )
	),

	'span_content'    => array(
		'type'  => 'text',
		'label' => __( 'Span Content', 'fw' ),
		'desc'  => __( 'Span Content', 'fw' ),
	),

	'span_class' => array(
		'label' => __('Span Class', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Span custom class', 'fw' ),
	),

	'span_id' => array(
		'label' => __('Span ID', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Span custom id', 'fw' ),
	),

	
	'span_data_atts' => array(
		'label' => __('Attributes', 'fw'),
		'type'  => 'text',
		'desc'  => __( 'Attributes', 'fw' ),
	),
);