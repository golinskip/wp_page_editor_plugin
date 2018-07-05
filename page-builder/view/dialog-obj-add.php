<?php
if (!defined('WPINC')) {
    die;
}
?>

<form method="post" action="" id="pb-sec-edit-form"> 
    <table>
        <?php
            $structures = wtst_page_builder_structures::get_structures();
            foreach($structures as $strName => $struct): ?>
            <div class="pb-obj-add-thumbnail-grid">
                <label>
                <p> 
                    <input type="radio" name="structure" value="<?php echo $struct['name']; ?>">
                    <?php echo $struct['title']; ?>
                </p>
                <p>
                    <img class="pb-obj-add-thumbnail" src="<?php echo $struct['url'] ?>/<?php echo $struct['image'] ?>"/>
                </p>
                </label>
            </div>
        <?php endforeach; ?>
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