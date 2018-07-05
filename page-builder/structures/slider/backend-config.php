<?php
// Slider
if (!defined('WPINC')) {
    die;
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
        <td><?php echo __('Duration', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('duration', $cnf['duration']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Size', 'wtst'); ?></td>
        <td><?php 
        $sizArr = [];
        foreach($structData['attr']['sizes'] as $size) {
            $sizArr[$size] = $size;
        }
        echo wtst_page_builder_form::options('size', $sizArr, $cnf['size']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Layout', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::options('layout', $structData['attr']['layout'], $cnf['layout']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Proportions', 'wtst'); ?></td>
        <td><?php 
        $propArr = [];
        foreach($structData['attr']['prop'] as $prop) {
            $propArr[$prop] = $prop;
        }
        echo wtst_page_builder_form::options('prop', $propArr, $cnf['prop']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Height', 'wtst'); ?></td>
        <td><?php echo wtst_page_builder_form::text('height', $cnf['height']); ?></td>
    </tr>
    <tr>
        <td><?php echo __('Num of slides', 'wtst'); ?></td>
        <td><?php 
        $nos = [];
        for($i=0; $i<10; $i++) {
            $nos[$i] = $i;
        }
        echo wtst_page_builder_form::options('num_of_slides', $nos, $cnf['num_of_slides'], ' onChange="pb.obj.editReset()" '); ?></td>
    </tr>
</table>
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
                    <td><?php echo __('Description', 'wtst'); ?></td>
                    <td>
                        <?php echo wtst_page_builder_form::text('slides[][description]', $curSlide['description'], false, '', 'description-'.$i); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Url', 'wtst'); ?></td>
                    <td>
                        <?php echo wtst_page_builder_form::text('slides[][url]', $curSlide['url'], false, '', 'url-'.$i); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Text position', 'wtst'); ?></td>
                    <td>
                        <?php echo wtst_page_builder_form::options('slides[][text_position]', $structData['attr']['text_position'], $curSlide['text_position']); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php endfor; ?>
</div>


<script type="text/javascript">
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
</script>