<?php
if (!defined('WPINC')) {
    die;
}
?>

<div id="carouselObj<?php echo $objCounter;?>" class="carousel slide" data-ride="carousel" style="<?php
    if($cnf['height'] != null) echo 'height: '.$cnf['height'].'; overflow:hidden;';
?>">
    
    <?php if((int)$cnf['num_of_slides'] > 1): ?>
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < $cnf['num_of_slides']; $i++): ?>
                <li data-target="#carouselObj<?php echo $objCounter;?>" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo "active" ?>"></li>
            <?php endfor; ?>
        </ol>
    <?php endif; ?>
        <div class="carousel-inner wtst-pb-slider wtst-pb-slider-<?php echo $cnf['layout']; ?>" role="listbox">
        <?php for ($i = 0; $i < $cnf['num_of_slides']; $i++): ?>
            <?php
            if (isset($cnf['slides'][$i])) {
                $curSlide = $cnf['slides'][$i];
            } else {
                $curSlide = $structData['default-cnf']['slides'][0];
            }
            if ($curSlide['media_type'] == 2) {
                $image = wp_get_attachment_image_src($curSlide['media_id'], 'full' );
                if ($image) {
                    list($src, $width, $height) = $image;
                }
                $imgSrc =  $src;
            } else {
                $imgSrc =  $curSlide['media_url'];
            }
            ?>
                <?php if($cnf['layout'] == 'parallax'): ?>
                    <div style="background:transparent;" class="carousel-item <?php if($i == 0) echo "active" ?> parallax-window" data-parallax="scroll" data-image-src="<?php echo $imgSrc; ?>">
                <?php else: ?>
                    <div class="carousel-item <?php if($i == 0) echo "active" ?>"  style="background-image: url('<?php echo $imgSrc; ?>')">
                <?php endif; ?>
                 
                <div class="carousel-caption car-<?php echo $curSlide['text_position']; ?>">
                        <h3><?php echo $curSlide['title']; ?></h3>
                        <p><?php echo $curSlide['description']; ?></p>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <?php if((int)$cnf['num_of_slides'] > 1): ?>
    <a class="carousel-control-prev no-scroll" href="#carouselObj<?php echo $objCounter;?>" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next no-scroll" href="#carouselObj<?php echo $objCounter;?>" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <?php endif; ?>
</div>