<?php
if (!defined('WPINC')) {
    die;
}
?>
<div class="wtst-pb-text-image-link <?php if($cnf['urlType'] == 3): ?>hideme<?php endif; ?>">
    <?php if($cnf['urlType'] == 1 || $cnf['urlType'] == 2): ?>
    
        <img alt="Generic placeholder image" class="rounded-circle" src="<?php
            if($cnf['urlType'] == 1) {
                echo $cnf['url'];
            } elseif($cnf['urlType'] == 2) {
                $image = wp_get_attachment_image_src($cnf['media_id'], 'full');
                if ( $image ) {
                    list($src, $width, $height) = $image;
                }
                echo $src;
            }
        ?>" />
        <h2><?php echo $cnf['title'] ?></h2>
    
    <?php elseif($cnf['urlType'] == 3): ?>
        
        <div class="circle"><strong><?php echo $cnf['title'] ?></strong></div>
        
    <?php endif; ?>
            <p><?php echo $cnf['content'] ?></p>
            <?php if($cnf['buttonText']!= null):?>
            <p><a class="btn btn-secondary" href="<?php echo $cnf['buttonLink'] ?>" role="button"><?php echo $cnf['buttonText'] ?> &raquo;</a></p>
            <?php endif; ?>
</div>