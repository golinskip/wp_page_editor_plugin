<?php if ( ! defined( 'WPINC' ) ) {
     die;
}?>
<div classs="wrap">
    <h1><?php echo __("Layout settings", 'wtst')?></h1>
    <p>
        <form id="wtst-fp-form">
            <div id="wtst-fp-canvas"></div>
        </form>
    </p>
</div>


<script type="text/javascript">
(function ($) { 
    $(document).ready(function (e) {
        pb.start('#wtst-fp-canvas', '<?php echo $post->post_type; ?>', <?php echo $post->ID; ?>);   
        $("#publish").click(function(e){
            pb.save();
        });
    });
})(jQuery);
</script>