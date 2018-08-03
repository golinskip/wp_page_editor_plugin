<?php
if (!defined('WPINC')) {
    die;
}
?>
<div class="wtst-pb-text-image-link">
    <?php if( (int)$cnf['media_id'] > 0  || strlen($cnf['media_url']) > 2 ): ?>
    
        <img alt="Generic placeholder image" class="rounded-circle" src="<?php
            if((int)$cnf['media_id'] > 0) {
                $image = wp_get_attachment_image_src($cnf['media_id'], 'full');
                if ( $image ) {
                    list($src, $width, $height) = $image;
                }
                echo $src;
            } else {
                echo $cnf['media_url'];
            }
        ?>" alt="<?php echo $cnf['media_alt']; ?>"/>
        <h2><?php echo $cnf['title'] ?></h2>
    
    <?php else: ?>
        <div class="circle"><strong><?php echo $cnf['title'] ?></strong></div>
    <?php endif; ?>
    
    <p><?php echo $cnf['content'] ?></p>
    <?php if($cnf['button_text']!= null):?>
        <p><a class="btn btn-secondary" href="<?php echo $cnf['button_link'] ?>" role="button"><?php echo $cnf['button_text'] ?> &raquo;</a></p>
    <?php endif; ?>
</div>