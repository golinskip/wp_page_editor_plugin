<?php
if (!defined('WPINC')) {
    die;
}

?>
<?php for($i=1; $i<=2; $i++): ?>
<h3><?php echo __('Side', 'wtst'); echo ' '.$i;?></h3>
<table>
    <tr>
        <td><?php echo __('Title', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::text('side'.$i.'[title]', $cnf['side'.$i]['title']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Description', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::text('side'.$i.'[description]', $cnf['side'.$i]['description']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Link', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::text('side'.$i.'[link]', $cnf['side'.$i]['link']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Color', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::text('side'.$i.'[color]', $cnf['side'.$i]['color'], false,
                        ' class="bgcolor" data-default-color="'.$cnf['side'.$i]['color'].'"'); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Image Type', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::options('side'.$i.'[imgType]', [
            '0' => 'no image',
            '1' => 'Image URL',
            '2' => 'Media',
        ], $cnf['side'.$i]['imgType']); ?></td>
    </tr>
    <tr class="wtst-pb-struct-img-edit-switch-url">
        <td><?php echo __('Image Url', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::text('side'.$i.'[imgUrl]', $cnf['side'.$i]['imgUrl']); ?></td>
    </tr>
    <tr class="wtst-pb-struct-img-edit-switch-media">
        <td><?php echo __('Media', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::media_selector('side'.$i.'[imgMediaId]', $cnf['side'.$i]['imgMediaId']); ?></td>
    </tr>
</table>
<?php endfor; ?>
<table>
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
    (function ($) {
        $(function () {
            $('.bgcolor').wpColorPicker();
        });
    })(jQuery);
</script>