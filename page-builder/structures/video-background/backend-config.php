<?php
if (!defined('WPINC')) {
    die;
}
?>

<table>
    <tr>
        <td><?php echo __('Video URL', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('videoUrl', $cnf['videoUrl']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Width', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('width', $cnf['width']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Height', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('height', $cnf['height']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Title', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('title', $cnf['title']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Description', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('description', $cnf['description']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Button 1 title', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('button1Title', $cnf['button1Title']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Button 1 url', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('button1Url', $cnf['button1Url']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Button 2 title', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('button2Title', $cnf['button2Title']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Button 2 url', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('button2Url', $cnf['button2Url']); ?></td>
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
</table>