<?php
if (!defined('WPINC')) {
    die;
}
?>
<div style="text-align:center">
<?php if(strlen($cnf['title_1']) > 0): ?>
    <?php echo $cnf['title_1']; ?>
    <?php if((int)$cnf['media_id_1'] > 0 || strlen($cnf['media_url_1']) > 3 ) : ?>
        <img class="<?php echo $cssPrfx; ?>image" src="<?php
            if((int)$cnf['media_id_1'] > 0) {
                $image = wp_get_attachment_image_src($cnf['media_id_1']);
                if ( $image ) {
                    list($src, $width, $height) = $image;
                }
                echo $src;
            } else {
                echo $cnf['media_url_1'];
            }
        ?>" alt="<?php echo $cnf['title_1']; ?>" />
    <?php endif; ?>
<?php endif; ?>
|
<?php if(strlen($cnf['title_2']) > 0): ?>
    <?php if((int)$cnf['media_id_2'] > 0 || strlen($cnf['media_url_2']) > 3 ) : ?>
        <img class="<?php echo $cssPrfx; ?>image" src="<?php
            if((int)$cnf['media_id_2'] > 0) {
                $image = wp_get_attachment_image_src($cnf['media_id_2']);
                if ( $image ) {
                    list($src, $width, $height) = $image;
                }
                echo $src;
            } else {
                echo $cnf['media_url_2'];
            }
        ?>" alt="<?php echo $cnf['title_2']; ?>" />
    <?php endif; ?>
    <?php echo $cnf['title_2']; ?>
<?php endif; ?>
</div>