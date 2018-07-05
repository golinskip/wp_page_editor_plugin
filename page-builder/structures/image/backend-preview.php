<?php // Image structure
if (!defined('WPINC')) {
    die;
}
$cssPrfx = "wtst-pb-struct-slider-";
?>
<style type="text/css">
    .<?php echo $cssPrfx; ?>image {
        width:100px;
        height-max: 80px;
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
    <img class="<?php echo $cssPrfx; ?>image" src="<?php
        if($cnf['urlType'] == 2) {
            $image = wp_get_attachment_image_src($cnf['media_id']);
            if ( $image ) {
                list($src, $width, $height) = $image;
            }
            echo $src;
        } else {
            echo $cnf['url'];
        }
    ?>" />
</div>
