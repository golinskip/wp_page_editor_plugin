<?php
if (!defined('WPINC')) {
    die;
}
?>

<div class="wtst-pb-swipe-card"> 
    <div class="front">
        <?php if(strlen($cnf['side1']['link']) > 0 ): ?><a href="<?php echo $cnf['side1']['link']; ?>"><?php endif; ?>
        <div class='wtst-pb-swipe-card-content'>
        <?php if(strlen($cnf['side1']['title']) > 0): ?>
            <h4><?php echo $cnf['side1']['title']; ?></h4>
        <?php endif; ?>
        <?php if(strlen($cnf['side1']['description']) > 0): ?>
            <p><?php echo $cnf['side1']['description']; ?></p>
        <?php endif; ?>
        </div>
        <?php if(strlen($cnf['side1']['link']) > 0 ): ?></a><?php endif; ?>
    </div> 
    <div class="back">
        <?php if(strlen($cnf['side2']['link']) > 0 ): ?><a href="<?php echo $cnf['side2']['link']; ?>"><?php endif; ?>
        <div class='wtst-pb-swipe-card-content'>
        <?php if(strlen($cnf['side2']['title']) > 0): ?>
            <h4><?php echo $cnf['side2']['title']; ?></h4>
        <?php endif; ?>
        <?php if(strlen($cnf['side2']['description']) > 0): ?>
            <p><?php echo $cnf['side2']['description']; ?></p>
        <?php endif; ?>
        </div>
        <?php if(strlen($cnf['side2']['link']) > 0 ): ?></a><?php endif; ?>
    </div> 
</div>