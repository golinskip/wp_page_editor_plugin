<?php
if (!defined('WPINC')) {
    die;
}
?>

<div class="wtst-pb-swipe-card"> 
    <div class="front">
        <?php if(strlen($cnf['link_1']) > 0 ): ?><a href="<?php echo $cnf['link_1']; ?>"><?php endif; ?>
        <div class='wtst-pb-swipe-card-content'>
        <?php if(strlen($cnf['title_1']) > 0): ?>
            <h4><?php echo $cnf['title_1']; ?></h4>
        <?php endif; ?>
        <?php if(strlen($cnf['description_1']) > 0): ?>
            <p><?php echo $cnf['description_1']; ?></p>
        <?php endif; ?>
        </div>
        <?php if(strlen($cnf['link_1']) > 0 ): ?></a><?php endif; ?>
    </div> 
    <div class="back">
        <?php if(strlen($cnf['link_2']) > 0 ): ?><a href="<?php echo $cnf['link_2']; ?>"><?php endif; ?>
        <div class='wtst-pb-swipe-card-content'>
        <?php if(strlen($cnf['title_2']) > 0): ?>
            <h4><?php echo $cnf['title_2']; ?></h4>
        <?php endif; ?>
        <?php if(strlen($cnf['description_2']) > 0): ?>
            <p><?php echo $cnf['description_2']; ?></p>
        <?php endif; ?>
        </div>
        <?php if(strlen($cnf['link_2']) > 0 ): ?></a><?php endif; ?>
    </div> 
</div>