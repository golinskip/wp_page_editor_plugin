<?php
if (!defined('WPINC')) {
    die;
}
$currentValue = isset($cnf[$keyName])?$cnf[$keyName]:$element['default'];
?>
<p>
<?php switch($element['type']):
     case 'text': ?>
        <label>
            <b><?php echo __($element['caption'], 'wtst'); ?></b><br/>
            <?php echo wtst_page_builder_form::text($inputName, $currentValue); ?>
        </label>
    <?php break;?>
    
    <?php case 'textbox': ?>
        <label>
            <b><?php echo __($element['caption'], 'wtst'); ?></b><br/>
            <?php echo wtst_page_builder_form::text($inputName, $currentValue, true); ?>
        </label>
    <?php break;?>
    
    <?php case 'number': ?>
        <label>
            <b><?php echo __($element['caption'], 'wtst'); ?></b><br/>
            <?php echo wtst_page_builder_form::number($inputName, $currentValue); ?>
        </label>
    <?php break;?>
    
    <?php case 'color_picker': ?>
        <label>
            <b><?php echo __($element['caption'], 'wtst'); ?></b><br/>
            <?php echo wtst_page_builder_form::color_picker($inputName, $currentValue); ?>
        </label>
    <?php break;?>
    
    <?php case 'options': ?>
        <label>
            <b><?php echo __($element['caption'], 'wtst'); ?></b><br/>
            <?php echo wtst_page_builder_form::options($inputName, $element['options'], $currentValue); ?>
        </label>
    <?php break;?>
    
    <?php case 'boolean': ?>
        <label>
            <b><?php echo __($element['caption'], 'wtst'); ?></b><br/>
            <?php echo wtst_page_builder_form::options($inputName, [
                0 => __("No", "wtst"),
                1 => __("Yes", "wtst"),
            ], $currentValue); ?>
        </label>
    <?php break;?>
    
    <?php case 'media': ?>
        <label>
            <b><?php echo __($element['caption'], 'wtst'); ?></b><br/>
            <?php echo wtst_page_builder_form::media_selector($inputName, $currentValue); ?>
        </label>
    <?php break;?>
    
    <?php case 'collection': ?>
        <?php include __DIR__ . DS . "dialog-obj-edit-form-collection.php"; ?>
    <?php break;?>

    <?php default: ?>
        <?php var_dump($element); ?>
    <?php break;?>
<?php endswitch; ?>
</p>