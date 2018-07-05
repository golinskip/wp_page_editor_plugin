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
        <td><?php echo __('Text 1', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('text1', $cnf['text1']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Text 2', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('text2', $cnf['text2']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Button text', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('button_text', $cnf['button_text']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Link URL', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('link', $cnf['link']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Style', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('style', $structData['attr']['styles'], $cnf['style']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Align', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('align', $structData['attr']['align'], $cnf['align']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Font size', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('font_size', $structData['attr']['font_size'], $cnf['font_size']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Margin top', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('margin_top', $cnf['margin_top']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Margin left', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('margin_left', $cnf['margin_left']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Margin right', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('margin_right', $cnf['margin_right']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Margin bottom', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('margin_bottom', $cnf['margin_bottom']); ?></td>
    </tr>
</table>
<?php
    echo wtst_page_builder_form::text('content', $cnf['content'], true);
?>