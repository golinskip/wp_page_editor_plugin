
<?php if ( ! defined( 'WPINC' ) ) {
     die;
}?>
<div classs="wrap">
    <h1><?php echo __("Frontpage settings", 'wtst')?></h1>
    <p>
        <form id="wtst-fp-form">
            <div id="wtst-fp-canvas"></div>
        </form>
    </p>
</div>

<script type="text/javascript">
jQuery(document).ready(function ($) {
    pb.start('#wtst-fp-canvas', 'frontpage', 0);
});
</script>