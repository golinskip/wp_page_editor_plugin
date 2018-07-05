<?php
if (!defined('WPINC')) {
    die;
}
?>

<table>
    <tr>
        <td><?php echo __('Title', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('title', $cnf['title']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Content', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('content', $cnf['content']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Align', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('align', [
            'left' => 'left',
            'right' => 'right',
            'center' => 'center',
            'justify' => 'justify',
            'auto' => 'auto',
        ], $cnf['align']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Image type', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('urlType', [
            '1' => 'Image URL',
            '2' => 'Media',
            '3' => 'Color in circle',
        ], $cnf['urlType']); ?></td>
    </tr>
    <tr id="wtst-pb-struct-img-edit-switch-url">
        <td><?php echo __('Image url', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('url', $cnf['url']); ?></td>
    </tr>
    <tr id="wtst-pb-struct-img-edit-switch-media">
        <td><?php echo __('Media', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::media_selector('media_id', $cnf['media_id']); ?></td>
    </tr>
    <tr id="wtst-pb-struct-img-edit-switch-ring">
        <td><?php echo __('Color', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::text('ring_color', $cnf['ring_color'], false,
                        ' class="bgcolor" data-default-color="#000"'); ?></td>
    </tr>
    
    <tr>
        <td><?php echo __('Button text', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('buttonText', $cnf['buttonText']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Button Url', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('buttonUrl', $cnf['buttonUrl']); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo __('Content', 'wtst'); ?></td>
    </tr>
</table>

<script type="text/javascript">
    function wtstPbStructImgMediaLocker() {
        var val = jQuery('#urlType').val();
        if(val === '1') {
            jQuery('#wtst-pb-struct-img-edit-switch-media').hide();
            jQuery('#wtst-pb-struct-img-edit-switch-url').show();
            jQuery('#wtst-pb-struct-img-edit-switch-ring').hide();
        } else if(val === '2') {
            jQuery('#wtst-pb-struct-img-edit-switch-media').show();
            jQuery('#wtst-pb-struct-img-edit-switch-url').hide();
            jQuery('#wtst-pb-struct-img-edit-switch-ring').hide();
        } else if(val === '3') {
            jQuery('#wtst-pb-struct-img-edit-switch-media').hide();
            jQuery('#wtst-pb-struct-img-edit-switch-url').hide();
            jQuery('#wtst-pb-struct-img-edit-switch-ring').show();
        }
    }
    wtstPbStructImgMediaLocker();
    jQuery('#urlType').click(wtstPbStructImgMediaLocker);
    (function ($) {
        $(function () {
            $('.bgcolor').wpColorPicker();
        });
    })(jQuery);
</script>