<?php
if (!defined('WPINC')) {
    die;
}
?>
<div style="text-align:<?php echo $cnf['align'] ?>;">
JUMBOTRON:<br/>
<?php if(strlen($cnf['title']) > 0): ?>
<h3><?php echo $cnf['title']; ?></h3>
<?php endif; ?>
    <?php echo substr(strip_tags($cnf['content']), 0, 300); ?>...
</div>