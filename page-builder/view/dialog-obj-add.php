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
                    <input type="radio" name="structure" value="<?php echo $struct['name']; ?>"  data-title="<?php echo $struct['title']; ?>">
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
        <input type="hidden" name="structure_title" class="pb-obj-add-structure-title"/>
</form>

<script type="text/javascript">
    (function ($) {
        $(function () {
            $('.pb-obj-add-thumbnail-grid input[name=structure]').click(function(){
                $('.pb-obj-add-structure-title').val($(this).attr('data-title'));
            });
        });
    })(jQuery);
</script>