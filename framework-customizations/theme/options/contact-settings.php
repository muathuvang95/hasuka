<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array (
    'contact-tab' => array (
        'title'   => esc_html__('contact settings') ,
        'type'    => 'tab' ,
        'options' => array (
            'contact-box' => array (
                'title'   => esc_html__('contacts') ,
                'type'    => 'box' ,
                'options' => array (
                    'contacts' => array(
                        'label'         => 'Contact info',
                        'popup-title'   => __( 'Add/Edit contact' ),
                        'desc'          => '',
                        'type'          => 'addable-box',
                        'width'         => 'full',
                        'template'      => '{{=header}}',
                        'box-options' => array(
                        	'icon' => array (
		                        'type'        => 'upload' ,
		                        'label'       => 'Icon' ,
		                        'desc'        => '',
		                        'images_only' => true,
		                    ),
                            'header'   => array(
                                'label' => __( 'Header' ),
                                'desc'  => __( 'Enter the Header of the contact' ),
                                'type'  => 'text'
                            ),
                            'body' => array(
                                'label' => __( 'Body' ),
                                'desc'  => __( 'Content' ),
                                'type'  => 'wp-editor',
                                //'editor_type' => 'html',
                                'size' => 'large',
                            )
                        ),
                        'sortable' => true,
                    ),
                ),
            ) ,
        ),
    ),
);