<?php if (!defined('WTST_PB_STYLE_FLIP')): ?>

<?php define('WTST_PB_STYLE_FLIP', true); endif; ?>


#<?php echo $obj['id'];?> .wtst-pb-swipe-card {
    width:  <?php echo $cnf['width']; ?>;
    height: <?php echo $cnf['height']; ?>;
    text-align:center;
}

#<?php echo $obj['id'];?> .wtst-pb-swipe-card .front {
    <?php if((int)$cnf['media_id_1'] > 0): ?>
        background-image:url(<?php $image = wp_get_attachment_image_src($cnf['media_id_1'], 'full');
        if ( $image ) {
            list($src, $width, $height) = $image;
        }
        echo $src; ?>);
    <?php elseif(strlen($cnf['media_url_1']) > 2) : ?>
        background-image:url(<?php echo $cnf['media_url_1']; ?>);
    <?php endif; ?>
    background-width:100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: <?php echo $cnf['color_1'];?>;
}

#<?php echo $obj['id'];?> .wtst-pb-swipe-card .back {
    <?php if((int)$cnf['media_id_2'] > 0): ?>
        background-image:url(<?php $image = wp_get_attachment_image_src($cnf['media_id_2'], 'full');
        if ( $image ) {
            list($src, $width, $height) = $image;
        }
        echo $src; ?>);
    <?php elseif(strlen($cnf['media_url_2']) > 2) : ?>
        background-image:url(<?php echo $cnf['media_url_2']; ?>);
    <?php endif; ?>
    background-width:100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: <?php echo $cnf['color_2'];?>;
}

#<?php echo $obj['id'];?> .wtst-pb-swipe-card-content {
    
}