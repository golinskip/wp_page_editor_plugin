<?php
if (!defined('WPINC')) {
    die;
}
?>

<form method="post" action="" id="pb-sec-edit-form">
        <?php echo wtst_page_builder_structures::get_structure_code($structData['name'], 'backend-config', $cnf, 0) ?>
        <hr class="pb-clearfix">
        <?php submit_button();?>
</form>

<script type="text/javascript">
    (function ($) {
        $(function () {
            $('#bgcolor').wpColorPicker();
        });
    })(jQuery);
</script>