<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array (
    'intro-tab' => array (
        'title'   => esc_html__('intro settings') ,
        'type'    => 'tab' ,
        'options' => array (
            'intro-box' => array (
                'title'   => esc_html__('intros') ,
                'type'    => 'box' ,
                'options' => array (
                    'intros' => array(
                        'label'         => 'intro info',
                        'popup-title'   => __( 'Add/Edit intro' ),
                        'desc'          => '',
                        'type'          => 'addable-box',
                        'width'         => 'full',
                        'template'      => '{{=header}}',
                        'box-options' => array(
                        	'icon' => array (
		                        'type'  => 'icon-v2',

                                /**
                                 * small | medium | large | sauron
                                 * Yes, sauron. Definitely try it. Great one.
                                 */
                                'preview_size' => 'medium',

                                /**
                                 * small | medium | large
                                 */
                                'modal_size' => 'medium',

                                /**
                                 * There's no point in configuring value from code here.
                                 *
                                 * I'll document the result you get in the frontend here:
                                 * 'value' => array(
                                 *   'type' => 'icon-font', // icon-font | custom-upload
                                 *
                                 *   // ONLY IF icon-font
                                 *   'icon-class' => '',
                                 *   'icon-class-without-root' => false,
                                 *   'pack-name' => false,
                                 *   'pack-css-uri' => false
                                 *
                                 *   // ONLY IF custom-upload
                                 *   // 'attachment-id' => false,
                                 *   // 'url' => false
                                 * ),
                                 */

                                'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                                'label' => __('Label', '{domain}'),
                                'desc'  => __('Description', '{domain}'),
                                'help'  => __('Help tip', '{domain}'),
		                    ),
                            'header'   => array(
                                'label' => __( 'Header' ),
                                'desc'  => __( 'Enter the Header of the intro' ),
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