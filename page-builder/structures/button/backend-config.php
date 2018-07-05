<?php
if (!defined('WPINC')) {
    die;
}
?>

<table>
    <tr>
        <td><?php echo __('Caption', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::text('caption', $cnf['caption']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Url', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::text('url', $cnf['url']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Style', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('style', $structData['attr']['style'], $cnf['style']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Size', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('size', $structData['attr']['size'], $cnf['size']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Width', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('width', $structData['attr']['width'], $cnf['width']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Align', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::options('align', $structData['attr']['align'], $cnf['align']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Margin top', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::number('margin_top',  $cnf['margin_top']); ?>px</td>
    </tr>
    <tr>
        <td><?php echo __('Margin bottom', 'wtst'); ?>:</td>
        <td><?php echo wtst_page_builder_form::number('margin_bottom', $cnf['margin_bottom']); ?>px</td>
    </tr>
</table>