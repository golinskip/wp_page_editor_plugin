<?php
if (!defined('WPINC')) {
    die;
}
?>
<div class="wtst-pb-struct-text-box">
    <div class="tb-<?php echo $cnf['style'];?>">
    <?php if(strlen($cnf['title']) > 0): ?>
        <h3>
            <?php if(strlen( $cnf['title_url'] > 3)): ?>
                <a href="<?php echo $cnf['title_url']; ?> "><?php echo $cnf['title']; ?></a>
            <?php else: ?>
                <span><?php echo $cnf['title']; ?></span>
            <?php endif; ?>
        </h3>
        <?php if((int)$cnf['hr_after'] > 0): ?>
            <div class="hr-theme">
                <div class="hr-line"></div>
                <div class="hr-icon"></div>
                <div class="hr-line"></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
        <div class="wtst-pb-struct-text-box-content"><?php echo do_shortcode( $cnf['content'] ); ?></div>
    </div>
</div>