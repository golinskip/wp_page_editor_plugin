<?php
if (!defined('WPINC')) {
    die;
}
$addReadMore = false;
$rma = (int)$cnf['read_more_after'];
$sumsize = 0;
//$objCounter
?>

<div class="row nopadding wtst-pb-portfolio wtst-pb-portfolio-<?php echo $cnf['style']; ?>">
        <?php foreach($cnf['slides'] as $curSlide):
                if((int)$curSlide['media_id'] > 0) {
                    $image = wp_get_attachment_image_src($curSlide['media_id'], "large");
                    $imageFull = wp_get_attachment_image_src($curSlide['media_id'], "full");
                    if ($image) {
                        list($src, $width, $height) = $image;
                    }
                    if ($imageFull) {
                        list($srcF, $widthF, $heightF) = $imageFull;
                    }
                    $imageUrl =  $src;
                    $imageUrlFull =  $srcF;
                } else {
                    $imageUrl =  $curSlide['media_url'];
                    $imageUrlFull =  $curSlide['media_url'];
                }
                $title = (strlen($curSlide['title']) > 0)?$curSlide['title']:$cnf['default_title'];
                $linkCaption = (strlen($curSlide['link_caption']) > 0)?$curSlide['link_caption']:$cnf['default_link_caption'];
                
                $cursize = (int)$cnf['in_row'] * (int)$curSlide['size'];
                $mainClass = 'col-md-'.$cursize;
                $mainClass.= ' nopadding';
                if ($sumsize % 12 == 0) {
                    $mainClass .= " pf-first";
                } else {
                    $mainClass .= " pf-not-first";
                }
                $sumsize+=$cursize;
                if ($sumsize % 12 == 0) {
                    $mainClass .= " pf-last";
                } else {
                    $mainClass .= " pf-not-last";
                }
                if($rma > 0 && $rma <= $i) {
                    $mainClass .= " wtst-pb-portfolio-hidden ";
                    $addReadMore = true;
                }
                
            ?>
            <div class="<?php echo $mainClass; ?>">
                <?php if($imageUrlFull != null):?>
                <?php if(strlen($curSlide['url']) > 2):?><a href ="<?php echo $curSlide['url']; ?>"><?php endif; ?>
                <div class="hovereffect" <?php if((int)$curSlide['custom_height'] > 0){ 
                    $hgh = (int)$curSlide['custom_height'];
                    $hgh = (isset($height) && $hgh<$height)?$height:$hgh;
                    echo 'style="height:'.$curSlide['custom_height'].'px"';
                }?>>
                    <img class="img-responsive" src="<?php echo $imageUrl; ?>">
                    
                    <div class="overlay">
                        <?php if(strlen($title) > 0):?>
                            <h2><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if(strlen($linkCaption) > 0):?>
                            <a class="info" data-title="<?php echo $title; ?>" <?php if(strlen($curSlide['url']) < 2):?> data-lightbox="portfolio" href="<?php echo $imageUrlFull; ?>"<?php else: ?> href="<?php echo $curSlide['url'] ?>" <?php endif;?>>
                                <?php echo $linkCaption; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(strlen($curSlide['url']) > 2):?></a><?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php if($addReadMore):?>
    <div class="col-md-12 text-center">
        <button type="button" class="btn wtst-pb-portfolio-hidden-show <?php echo $cnf['button_style']; ?>"  role="button"><?php echo $cnf['read_more_caption'];?> <i class="fas fa-angle-double-down"></i></button>
    </div>
    <?php endif; ?>
</div>