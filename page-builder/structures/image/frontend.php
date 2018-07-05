<?php
if (!defined('WPINC')) {
    die;
}
        if($cnf['urlType'] == 2) {
            $image = wp_get_attachment_image_src($cnf['media_id'], 'full');
            if ( $image ) {
                list($src, $width, $height) = $image;
            }
            $imgUrl = $src;
        } else {
            $imgUrl = $cnf['url'];
        }
?>
<?php if(strlen($cnf['link']) > 2): ?><a href="<?php echo $cnf['link']; ?>"><?php endif; ?>
<?php if($cnf['layout'] == 'parallax'): ?>
    <div class="parallax-window" data-image-src="<?php echo $imgUrl; ?>"></div>
<?php else: ?>
<div class="" style="<?php
    if (strlen($cnf['align']) > 0 ) echo "text-align:".$cnf['align']."; ";
?>">
    <img class="" src="<?php echo $imgUrl; ?>" style="<?php
        if (strlen($cnf['width']) > 0 ) echo "width:".$cnf['width']."; ";
        if (strlen($cnf['height']) > 0 ) echo "height:".$cnf['height']."; ";
        
    ?>"/>
</div>
<?php endif; ?>
<?php if(strlen($cnf['link']) > 2): ?></a><?php endif; ?>