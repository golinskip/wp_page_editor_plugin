<?php wp_enqueue_script('jquery-lightbox', plugin_dir_url(__FILE__) . '../../js/lightbox.min.js', array(), false, true); ?>

<?php /* Together start */ if (!defined('WTST_PB_JS_PORTFOLIO')): ?>
//<script>
(function ($) {
        $('.wtst-pb-portfolio-hidden-show').click(function(e){
            e.preventDefault();
            $('.wtst-pb-portfolio-hidden').show('slow');
            $('.wtst-pb-portfolio-hidden-show').hide('slow');
            jQuery(window).trigger('resize');
            return false;
        });
})(jQuery);
<?php /* Together end */  define('WTST_PB_JS_PORTFOLIO', true);endif;?>