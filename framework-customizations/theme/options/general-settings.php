<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//$slides = array();

$options = array(
	'general' => array(
		'title'   => __( 'General' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => __( 'General Settings' ),
				'type'    => 'box',
				'options' => array(
					'hotline'    => array(
						'label' => __( 'Hotline' ),
						'desc'  => '',
						'type'  => 'text',
						'value' => ''
					),
					'phone'    => array(
						'label' => __( 'Phone number' ),
						'desc'  => 'Số điện thoại',
						'type'  => 'text',
						'value' => ''
					),
					'address'    => array(
						'label' => __( 'Address' ),
						'desc'  => 'Địa chỉ cửa hàng',
						'type'  => 'text',
						'value' => ''
					),
					'email'    => array(
						'label' => __( 'Email' ),
						'desc'  => 'Địa chỉ email',
						'type'  => 'text',
						'value' => ''
					),
					'website'    => array(
						'label' => __( 'Website' ),
						'desc'  => 'Địa chỉ website',
						'type'  => 'text',
						'value' => ''
					),
					'text-copyright'    => array(
						'label' => __( 'Text copyright' ),
						'desc'  => '',
						'type'  => 'text',
						'value' => ''
					),
				)
			),
		)
	)
);

if(function_exists('get_masterslider_names')) {
	$options['general']['options']['general-box']['options']['slider'] = array(
		'label' => __( 'Slider' ),
		'desc'  => '',
		'value'  => '',
		'type'  => 'select',
		'choices' => get_masterslider_names()
	);
}