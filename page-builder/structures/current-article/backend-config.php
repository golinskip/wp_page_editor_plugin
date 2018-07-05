<?php
if (!defined('WPINC')) {
    die;
}
?>
<table>
    <tr>
        <td><?php echo __('Show title', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('show_title', [
            0 => 'No',
            1 => 'Yes',
        ], $cnf['show_title']); ?></td>
    </tr>

</table>