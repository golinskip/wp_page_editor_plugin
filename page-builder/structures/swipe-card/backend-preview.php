<?php
if (!defined('WPINC')) {
    die;
}
?>
<div>
    
<h3><?php echo __('Swipe card', 'wtst'); ?></h3>
<?php if(strlen($cnf['side1']['title']) > 0): ?>
    <?php echo $cnf['side1']['title']; ?>
<?php endif; ?>
|
<?php if(strlen($cnf['side2']['title']) > 0): ?>
    <?php echo $cnf['side2']['title']; ?>
<?php endif; ?>
</div>