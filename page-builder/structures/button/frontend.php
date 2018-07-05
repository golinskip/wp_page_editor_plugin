<?php
if (!defined('WPINC')) {
    die;
}
$btnStyle = 'btn ';
$btnStyle.= $cnf['style'];
if( $cnf['width'] == 'full') {
    $btnStyle.=' btn-block';
}
if( $cnf['size'] != 'normal') {
    $btnStyle.=' '.$cnf['size'];
}

?>
<div class="wtst-pb-struct-button">
    <button type="button" onClick="location.href='<?php echo $cnf['url'];?>'" class="<?php echo $btnStyle;?> ">
        <?php echo $cnf['caption'];?>
    </button>
</div>