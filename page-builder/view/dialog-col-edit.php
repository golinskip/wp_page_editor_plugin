<?php
if (!defined('WPINC')) {
    die;
}
global $optionsCnf;
global $defaultCnf;
?>

<form method="post" action="" id="pb-col-edit-form"> 
    <table>
        <tr>
            <td><?php echo __('Column size', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('size', $optionsCnf['col']['size'], $cfg['size']); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo __('Text style', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('txtstyle', $optionsCnf['col']['txtstyle'], $cfg['txtstyle']);?></td>
        </tr>
        <tr>
            <td><?php echo __('Transparent', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('transparent', $optionsCnf['col']['transparent'], $cfg['transparent']);?></td>
        </tr>
        <tr>
            <td><?php echo __('Margin', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('margin', $optionsCnf['col']['margin'], $cfg['margin']);?></td>
        </tr>
        <tr>
            <td><?php echo __('Background color', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::text('bgcolor', $cfg['bgcolor'], false, ' data-default-color="'.$cfg['bgcolor'].'"'); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Background image', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::media_selector('bgimage', $cfg['bgimage']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Background image style', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('bgstyle', $optionsCnf['col']['bgstyle'], $cfg['bgstyle']);?></td>
        </tr>
        <tr>
            <td><?php submit_button();?></td>
            <td></td>   
        </tr>
    </table>
</form>

<script type="text/javascript">
    (function ($) {
        $(function () {
            $('#bgcolor').wpColorPicker();
        });
    })(jQuery);
</script>