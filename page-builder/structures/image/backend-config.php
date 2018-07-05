<?php
// Single image
if (!defined('WPINC')) {
    die;
}
?>

<table id="wtst-pb-struct-img-edit">
    <tr>
        <td><?php echo __('Image Type', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('urlType', [
            '1' => 'Image URL',
            '2' => 'Media',
        ], $cnf['urlType']); ?></td>
    </tr>
    <tr id="wtst-pb-struct-img-edit-switch-url">
        <td><?php echo __('Image Url', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('url', $cnf['url']); ?></td>
    </tr>
    <tr id="wtst-pb-struct-img-edit-switch-media">
        <td><?php echo __('Media', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::media_selector('media_id', $cnf['media_id']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Align', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('align', $structData['attr']['align'], $cnf['align']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Layout', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('layout', $structData['attr']['layouts'], $cnf['layout']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Parallax speed', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('parallax_speed', $cnf['parallax_speed']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Link', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('link', $cnf['link']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Width', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('width', $cnf['width']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Height', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('height', $cnf['height']); ?></td>
    </tr>
</table>

<script type="text/javascript">
    function wtstPbStructImgMediaLocker() {
        if(jQuery('#urlType').val() === '1') {
            jQuery('#wtst-pb-struct-img-edit-switch-media').hide();
            jQuery('#wtst-pb-struct-img-edit-switch-url').show();
        } else {
            jQuery('#wtst-pb-struct-img-edit-switch-media').show();
            jQuery('#wtst-pb-struct-img-edit-switch-url').hide();
        }
    }
    wtstPbStructImgMediaLocker();
    jQuery('#urlType').click(wtstPbStructImgMediaLocker);
</script>