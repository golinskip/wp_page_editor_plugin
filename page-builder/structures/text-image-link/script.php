// <script>
    <?php /* Together start */ if (!defined('WTST_PB_JS_TEXT_IMAGE_LINK')): ?>

        <?php wp_enqueue_script('jquery-shower', plugin_dir_url(__FILE__) . '../../js/jquery.shower.js', array(), false, true); ?>
        <?php wp_enqueue_script('jquery-circle-progress', plugin_dir_url(__FILE__) . '../../js/jquery.circle-progress.js', array(), false, true); ?>

        <?php /* Together end */ define('WTST_PB_JS_TEXT_IMAGE_LINK', true);
    endif; ?>