

<?php /* Together start */ if (!defined('WTST_PB_JS_SWIPE_CARD')): ?>

    <?php wp_enqueue_script('jquery-flip', 'https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js', array(), false, true); ?>
    // <script>

 <?php /* Together end */  define('WTST_PB_JS_SWIPE_CARD', true);endif;?>
     
(function ($) {
    $(function () {
        $('#<?php echo $obj['id'];?>').flip({
            trigger: 'hover'
        });
    });
})(jQuery);
