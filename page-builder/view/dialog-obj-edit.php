<?php
if (!defined('WPINC')) {
    die;
}
?>

<form method="post" action="" id="pb-sec-edit-form">
        <?php 
        if(isset($structData['config'])) {
            global $defaultCnf;
            $formData = array_merge($structData['config'], $defaultCnf['obj']['config']);
            include(__DIR__ . DS . 'dialog-obj-edit-form.php');
        } else {
            echo wtst_page_builder_structures::get_structure_code($structData['name'], 'backend-config', $cnf, 0);
        }
         ?>
        <hr class="pb-clearfix">
        <?php submit_button();?>
</form>