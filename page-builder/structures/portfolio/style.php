<?php wp_enqueue_style('jquery-shower', plugin_dir_url(__FILE__) . '../../css/lightbox.min.css'); ?>
<?php /* Together start */ if (!defined('WTST_PB_CSS_PORTFOLIO')): ?>

<?php /* Together end */  define('WTST_PB_CSS_PORTFOLIO', true);endif;?>
    #<?php echo $obj['id'];?> .hovereffect {
        height:<?php echo $cnf['height']; ?>px;
        margin-bottom:<?php echo $cnf['padding'];?>px;
    }
    #<?php echo $obj['id'];?> .pf-not-last {
        padding-right:<?php echo $cnf['padding'];?>px;
    }