<?php if (!defined('WTST_PB_STYLE_FLIP')): ?>



<?php define('WTST_PB_STYLE_FLIP', true); endif; ?>

#<?php echo $obj['id'];?> .wtst-pb-swipe-card {
    width:  <?php echo $obj['cnf']['width']; ?>;
    height: <?php echo $obj['cnf']['height']; ?>;
    text-align:center;
}

#<?php echo $obj['id'];?> .wtst-pb-swipe-card .front{
    <?php if($cnf['side1']['imgType'] != 0): ?>
    background-image:url(<?php
        if($cnf['side1']['imgType'] == 2) {
            $image = wp_get_attachment_image_src($cnf['side1']['imgMediaId'], 'full');
            if ( $image ) {
                list($src, $width, $height) = $image;
            }
            echo $src;
        } else {
            echo $cnf['side1']['imgUrl'];
        }
    ?>);
    <?php endif; ?>
    background-width:100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
     background-attachment: fixed;
    background-color: <?php echo $cnf['side1']['color'];?>;
}

#<?php echo $obj['id'];?> .wtst-pb-swipe-card .back{
    
    <?php if($cnf['side2']['imgType'] != 0): ?>
    background-image:url(<?php
        if($cnf['side2']['imgType'] == 2) {
            $image = wp_get_attachment_image_src($cnf['side2']['imgMediaId'], 'full');
            if ( $image ) {
                list($src, $width, $height) = $image;
            }
            echo $src;
        } else {
            echo $cnf['side2']['imgUrl'];
        }
    ?>);
    <?php endif; ?>
    background-width:100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
     background-attachment: fixed;
    background-color: <?php echo $cnf['side2']['color'];?>;
}

#<?php echo $obj['id'];?> .wtst-pb-swipe-card-content {
    
}