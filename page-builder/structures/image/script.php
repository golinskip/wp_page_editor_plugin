<?php if($cnf['layout'] == 'parallax'): ?>
    <?php wp_enqueue_script('jquery-parallax', plugin_dir_url(__FILE__) . '../../js/parallax.min.js', array(), false, true); ?>
//<script>
(function($) {
    // http://pixelcog.github.io/parallax.js/
    $(document).ready(function(){
        $('#<?php echo $obj['id'];?> .parallax-window').parallax({
            imageSrc: $('#<?php echo $obj['id'];?> .parallax-window').attr('data-image-src'),
            speed: <?php echo $cnf['parallax_speed']; ?>,
            zIndex: 10
        });
    });
    
})(jQuery);

<?php endif; ?>