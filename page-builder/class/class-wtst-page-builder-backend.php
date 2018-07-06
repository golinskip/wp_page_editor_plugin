<?php

class wtst_page_builder_backend {

    public function init() {
        wp_enqueue_media();
        wp_enqueue_editor();

        wp_enqueue_script( 'text-widgets' );
        
        wp_enqueue_style( 'wp-color-picker');
        wp_enqueue_script( 'wp-color-picker');
        
        wp_register_script( 'jQueryUI', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', null, null, true );
        wp_enqueue_script('jQueryUI');
        wp_register_style( 'jQueryUI', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
        wp_enqueue_style('jQueryUI');
        
        wp_enqueue_script('jquery-serialize-object-3', plugin_dir_url(__FILE__) . '../js/jquery.serialize-object.js');
        wp_enqueue_script('wtst-page-builder', plugin_dir_url(__FILE__) . '../js/wtst-page-builder.js');
        wp_enqueue_style ('wtst-page-builder', plugin_dir_url(__FILE__) . '../css/wtst-page-builder.css');
        wp_localize_script(
            'ajax-script',
            'ajax_object',
            array(
                'ajax_url' => admin_url('admin-ajax.php'), 
            )
        );
    }

}
