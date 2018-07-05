<?php
// Slider
if (!defined('WPINC')) {
    die;
}
if($cnf['source'] == 'grid-kit' && !is_plugin_active('portfolio-wp/portfolio-wp.php')) {
    $cnf['source'] = 'local';
}
?>

<style type="text/css">
    .wtst-pb-struct-slider-slide {
        background-color: #eee;
        padding: 10px;
        margin: 10px;
        border: #aaa 1px solid;
    }
</style>


<table id="wtst-pb-struct-slider-edit">
    <tr>
        <td><?php echo __('Style', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('style', $structData['attr']['style'], $cnf['style']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('In row', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('in_row', $structData['attr']['in_row'], $cnf['in_row']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Height', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::number('height', $cnf['height']); ?>px</td></td>
    </tr>
    <tr>
        <td><?php echo __('Padding', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::number('padding', $cnf['padding']); ?>px</td></td>
    </tr>
    <tr>
        <td><?php echo __('Default title', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('default_title', $cnf['default_title']); ?></td></td>
    </tr>
    <tr>
        <td><?php echo __('Default link caption', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('default_link_caption', $cnf['default_link_caption']); ?></td></td>
    </tr>
    <tr>
        <td><?php echo __('Source', 'wtst'); ?></td>
        <td>
            
            <?php 
            $sources = ['local' => 'local'];
            if(is_plugin_active('portfolio-wp/portfolio-wp.php')) {
                $sources['grid-kit'] = 'grid-kit';
            }
            echo wtst_page_builder_form::options('source', $sources, $cnf['source'], ' onChange="pb.obj.editReset()"' ); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo __('Read more after', 'wtst'); ?></td>
        <td><?php 
        $sal = [0 => 'show all'];
        for($i=1; $i<=(int)$cnf['num_of_slides']; $i++) {
            $sal[$i] = $i;
        }
        echo wtst_page_builder_form::options('read_more_after', $sal, $cnf['read_more_after']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Read more caption', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('read_more_caption', $cnf['read_more_caption']); ?></td></td>
    </tr>
    <tr>
        <td><?php echo __('Read more button style', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('button_style', $structData['attr']['button_style'], $cnf['button_style']); ?></td>
    </tr>
    <?php if($cnf['source'] == 'grid-kit' && is_plugin_active('portfolio-wp/portfolio-wp.php')): ?>
    <tr>
        <td><?php echo __('Grid kit galery', 'wtst'); ?></td>
        <td>
            <?php
                global $wpdb;
                $grid_kit_galery_sources = [];
                $result = $wpdb->get_results( "SELECT * FROM ".CRP_TABLE_PORTFOLIOS , ARRAY_A );
                foreach($result as $res) {
                    $grid_kit_galery_sources[$res['id']] = $res['title'];
                }
                echo wtst_page_builder_form::options('grid_kit_galery', $grid_kit_galery_sources, $cnf['grid_kit_galery'] );
            ?>
        </td>
    </tr>
    <?php endif; ?>
    <?php if($cnf['source'] == 'local'): ?>
    <tr>
        <td><?php echo __('Num of images', 'wtst'); ?></td>
        <td><?php 
        $nos = [];
        for($i=0; $i<100; $i++) {
            $nos[$i] = $i;
        }
        echo wtst_page_builder_form::options('num_of_slides', $nos, $cnf['num_of_slides'], ' onChange="pb.obj.editReset()"' ); ?></td>
    </tr>
    <?php endif; ?>
</table>
<?php if($cnf['source'] == 'local'): ?>
<div id="wtst-pb-struct-slider-canvas">
    <?php for($i=0; $i<$cnf['num_of_slides']; $i++): ?>
    <div class="wtst-pb-struct-slider-slide">
        <div class="wtst-pb-struct-slider-slide-body">
            <?php if(isset($cnf['slides'][$i])) {
                $curSlide = $cnf['slides'][$i];
            } else {
                $curSlide = $structData['default-cnf']['slides'][0];
            }?>
            <table>
                <tr>
                    <td><?php echo __('Media Type', 'wtst'); ?></td>
                    <td><?php echo wtst_page_builder_form::options('slides[][media_type]', [
                        '1' => 'Image URL',
                        '2' => 'Media',
                    ], $curSlide['media_type'], ' class="media-type"', 'media-type-'.$i); ?></td>
                </tr>
                <tr class="wtst-pb-struct-img-edit-switch-url">
                    <td><?php echo __('Media Url', 'wtst'); ?></td>
                    <td>
                        <?php echo wtst_page_builder_form::text('slides[][media_url]', $curSlide['media_url'], false, '', 'media-url-'.$i); ?>
                    </td>
                </tr>
                <tr class="wtst-pb-struct-img-edit-switch-media">
                    <td><?php echo __('Media', 'wtst'); ?></td>
                    <td>
                        <?php echo wtst_page_builder_form::media_selector('slides[][media_id]', $curSlide['media_id'], 'media-id-'.$i); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Title', 'wtst'); ?></td>
                    <td>
                        <?php echo wtst_page_builder_form::text('slides[][title]', $curSlide['title'], false, '', 'title-'.$i); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Link caption', 'wtst'); ?></td>
                    <td>
                        <?php echo wtst_page_builder_form::text('slides[][link_caption]', $curSlide['link_caption'], false, '', 'link-caption-'.$i); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Url', 'wtst'); ?></td>
                    <td>
                        <?php echo wtst_page_builder_form::text('slides[][url]', $curSlide['url'], false, '', 'url-'.$i); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Size', 'wtst'); ?></td>
                    <td><?php echo wtst_page_builder_form::options('slides[][size]', $structData['attr']['sub_sizes'], $curSlide['size'], ' class=""', 'size-'.$i); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Custom height', 'wtst'); ?></td>
                    <td><?php echo wtst_page_builder_form::number('slides[][custom_height]', $curSlide['custom_height']); ?>px (0 - default)</td>
                </tr>
            </table>
        </div>
    </div>
    <?php endfor; ?>
</div>
<?php endif; ?>


<script type="text/javascript">
    
    <?php if($cnf['source'] == 'local'): ?>
    function wtstPbStructImgMediaLocker() {
        jQuery('.media-type').each(function(){
            if(jQuery(this).val() === '1') {
                jQuery(this).parent().parent().parent().find('.wtst-pb-struct-img-edit-switch-media').hide();
                jQuery(this).parent().parent().parent().find('.wtst-pb-struct-img-edit-switch-url').show();
            } else {
                jQuery(this).parent().parent().parent().find('.wtst-pb-struct-img-edit-switch-media').show();
                jQuery(this).parent().parent().parent().find('.wtst-pb-struct-img-edit-switch-url').hide();
            }
        });
    }
    wtstPbStructImgMediaLocker();
    jQuery('.media-type').change(wtstPbStructImgMediaLocker);
    jQuery('#wtst-pb-struct-slider-canvas').sortable();
    <?php endif; ?>
    
</script>