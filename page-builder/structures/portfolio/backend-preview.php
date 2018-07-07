<?php // Slider structure

if (!defined('WPINC')) {
    die;
}
$cssPrfx = "wtst-pb-struct-img-";
?>
<style type="text/css">
    .<?php echo $cssPrfx; ?>image {
        max-width:100px;
        height: 80px;
        padding: 4px;
        border: #999 2px solid;
    }
    .<?php echo $cssPrfx; ?>img-container {
        text-align:center;
        padding: 5px;
        width: 100%;
    }
    .<?php echo $cssPrfx; ?>link {
        text-align:center;
        padding: 5px;
        width: 100%;
    }
</style>
<div class="<?php echo $cssPrfx; ?>img-container">
    <?php foreach($cnf['slides'] as $curSlide): ?>
        <img class="<?php echo $cssPrfx; ?>image" src="<?php
            if((int)$curSlide['media_id'] > 0) {
                $image = wp_get_attachment_image_src($curSlide['media_id']);
                if ( $image ) {
                    list($src, $width, $height) = $image;
                }
                echo $src;
            } else {
                echo $curSlide['media_url'];
            }
        ?>" alt="<?php echo $curSlide['title']; ?>" />
    <?php endforeach; ?>
</div>
