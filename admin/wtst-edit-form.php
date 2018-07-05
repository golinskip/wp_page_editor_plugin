<?php
add_action( 'edit_form_after_editor', 'wtst_page_builder_on_edit_form' );
function wtst_page_builder_on_edit_form($post) {
    
    $wtst_page_builder_backend = new wtst_page_builder_backend();
    $wtst_page_builder_backend->init();
    include __DIR__ . DS . 'theme' . DS . 'edit-form-theme.php';
}
