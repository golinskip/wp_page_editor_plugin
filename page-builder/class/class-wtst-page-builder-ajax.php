<?php

/**
 * Description of class-wtst-page-builder-ajax
 *
 * @author Paweł
 */
class wtst_page_builder_ajax {
    public function load_backend() {
    
        $type = $_POST['type'];
        $type_id = (int)$_POST['type_id'];
        $wtst_page_builder_converter = new wtst_page_builder_converter();
        $wtst_page_builder_database = new wtst_page_builder_database();
        $inputData = $wtst_page_builder_database->loadContent($type, $type_id);
        $response = [
            'html' => $wtst_page_builder_converter->object_to_backend(json_decode($inputData[1], true), $inputData[0]),
        ];
        wp_send_json( $response );
    }
    
    public function dialog_sec_edit() {
        $cfg = json_decode(stripslashes($_POST['config']), true);
        ob_start();
        include __DIR__.UP.DS.'view'.DS.'dialog-sec-edit.php';
        $outHtml = ob_get_clean();
        $response = [
            'title' => __('Edit Section', 'wtst'),
            'html' => $outHtml,
        ];
        wp_send_json( $response );
    }
    
    public function dialog_sec_edit_check() {
        ob_start();
        //include __DIR__.UP.DS.'view'.DS.'dialog-sec-edit.php';
        $outHtml = ob_get_clean();
        $response = [
            'status' => true,
        ];
        wp_send_json( $response );
    }
    
    public function dialog_col_edit() {
        $cfg = json_decode(stripslashes($_POST['config']), true);
        ob_start();
        include __DIR__.UP.DS.'view'.DS.'dialog-col-edit.php';
        $outHtml = ob_get_clean();
        $response = [
            'title' => __('Edit Column', 'wtst'),
            'html' => $outHtml,
        ];
        wp_send_json( $response );
    }
    
    public function dialog_col_edit_check() {
        ob_start();
        //include __DIR__.UP.DS.'view'.DS.'dialog-sec-edit.php';
        $outHtml = ob_get_clean();
        $response = [
            'status' => true,
        ];
        wp_send_json( $response );
    }
    
    public function dialog_obj_add() {
        ob_start();
        include __DIR__.UP.DS.'view'.DS.'dialog-obj-add.php';
        $outHtml = ob_get_clean();
        $response = [
            'title' => __('Add Object', 'wtst'),
            'html' => $outHtml,
        ];
        wp_send_json( $response );
    }
    
    public function dialog_obj_edit() {
        $structType = addslashes($_POST['type']);
        $cfg = json_decode(stripslashes($_POST['config']), true);
        
        $structData = wtst_page_builder_structures::get_structure_data($structType);
        $cnf = wtst_page_builder_structures::get_structure_cnf($structType, $cfg);
        ob_start();
        include __DIR__.UP.DS.'view'.DS.'dialog-obj-edit.php';
        $outHtml = ob_get_clean();
        $response = [
            'title' => __('Edit Object', 'wtst'),
            'html' => $outHtml,
        ];
        wp_send_json( $response );
    }
    
    public function dialog_obj_preview() {
        $structType = addslashes($_POST['type']);
        $cfg = json_decode(stripslashes($_POST['config']), true);
        $cnf = wtst_page_builder_structures::get_structure_cnf($structType, $cfg);
        $outHtml = wtst_page_builder_structures::get_structure_code($structType, 'backend-preview', $cnf, 0);
        $response = [
            'title' => __('Edit Object', 'wtst'),
            'html' => $outHtml,
        ];
        wp_send_json( $response );
    }
    
    public function save() {
        $inputData = addslashes($_POST['data']);
        $type = $_POST['type'];
        $type_id = (int)$_POST['type_id'];
        $enabled = (bool)$_POST['enabled'];
        $wtst_page_builder_converter = new wtst_page_builder_converter();
        $outputData = $wtst_page_builder_converter->backend_to_object($inputData);
        $wtst_page_builder_database = new wtst_page_builder_database();
        $wtst_page_builder_database->saveContent($type, $type_id, json_encode($outputData), $enabled);
        $response = [
            'data' => __("Template saved", 'wtst'),
        ];
        wp_send_json( $response );
    }
    
    
    public function init() {
        
        add_action( 'wp_ajax_wtst_pb_parse_backend', array($this, 'load_backend'));
        
        add_action( 'wp_ajax_wtst_pb_dialog_sec_edit', array($this, 'dialog_sec_edit'));
        add_action( 'wp_ajax_wtst_pb_dialog_sec_edit_check', array($this, 'dialog_sec_edit_check'));
        add_action( 'wp_ajax_wtst_pb_dialog_col_edit', array($this, 'dialog_col_edit'));
        add_action( 'wp_ajax_wtst_pb_dialog_col_edit_check', array($this, 'dialog_col_edit_check'));
        
        add_action( 'wp_ajax_wtst_pb_dialog_obj_add', array($this, 'dialog_obj_add'));
        add_action( 'wp_ajax_wtst_pb_dialog_obj_edit', array($this, 'dialog_obj_edit'));
        add_action( 'wp_ajax_wtst_pb_dialog_obj_preview', array($this, 'dialog_obj_preview'));
        
        add_action( 'wp_ajax_wtst_pb_save', array($this, 'save'));
        
    }
}
