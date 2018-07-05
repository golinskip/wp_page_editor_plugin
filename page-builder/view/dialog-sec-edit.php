<?php
if (!defined('WPINC')) {
    die;
}
global $optionsCnf;
global $defaultCnf;
?>

<form method="post" action="" id="pb-sec-edit-form"> 
    <table>
        <tr>
            <td><?php echo __('Anchor alias', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::text('anchor', $cfg['anchor']);  ?></td>
        </tr>
        <tr>
            <td><?php echo __('Padding top', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::number('padding_top', $cfg['padding_top']);  ?>px</td>
        </tr>
        <tr>
            <td><?php echo __('Padding bottom', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::number('padding_bottom', $cfg['padding_bottom']);  ?>px</td>
        </tr>
        <tr>
            <td><?php echo __('Section width', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('width', $optionsCnf['sec']['width'], $cfg['width']);?></td>
        </tr>
        <tr>
            <td><?php echo __('Section height', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('height', $optionsCnf['sec']['height'], $cfg['height']);?></td>
        </tr>
        <tr><td colspan="2"><hr></td></tr>
        <tr>
            <td><?php echo __('Text style', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('txtstyle', $optionsCnf['sec']['txtstyle'], $cfg['txtstyle']);?></td>
        </tr>
        <tr>
            <td><?php echo __('Transparent', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('transparent', $optionsCnf['sec']['transparent'], $cfg['transparent']);?></td>
        </tr>
        <tr>
            <td><?php echo __('Background image style', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::options('bgstyle', $optionsCnf['sec']['bgstyle'], $cfg['bgstyle']);?></td>
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
            <td><?php echo __('Background parallax speed', 'wtst'); ?></td>
            <td><?php echo wtst_page_builder_form::number('parallax_speed', $cfg['parallax_speed'], ' step="0.01"'); ?></td>
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
            $(".slider").slider({
                range: "min",
                value: 1,
                step: 1,
                min: 0,
                max: 200,
                slide: function(event, ui) {
                    $("input").val("$" + ui.value);
                }
            });
        });
    })(jQuery);
</script>