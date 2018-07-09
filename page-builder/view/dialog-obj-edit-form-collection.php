<?php
if (!defined('WPINC')) {
    die;
}
$rootKeyName = $keyName;
$rootCurrentValue = $currentValue;
$rootElement = $element;
?>
<pre>
<?php
    $elBegin = '<div class="wtst-pb-collection-el"><h3><span class="title"></span></h3><div class="wtst-pb-collection-el-body"><button class="button remove"><span class="ui-icon ui-icon-trash"></span></button>';
    $elEnd = '</div></div>';
    $prototype = $elBegin;
    foreach($rootElement['components'] as $curKey => $element){
        $inputName = $rootKeyName.'[]['.$curKey.']';
        $keyName = $curKey;
        ob_start();
        include __DIR__ . DS . "dialog-obj-edit-form-controll.php";
        $prototype.=ob_get_clean();
    }
    $prototype.= $elEnd;
?>
</pre>
<div class="wtst-pb-collection-buttons">
    <input id="wtst-pb-collection-button-add" class="button" type="button" value="<?php echo __('Add', 'wtst');?> +" data-prototype="<?php echo htmlentities( $prototype );?>">
</div>
<div id="wtst-pb-collection-canvas">
    <?php $i=0; foreach($rootCurrentValue as $row): ?>
        <?php echo $elBegin; ?>
            <?php foreach($rootElement['components'] as $curKey => $element) {
                $inputName = $rootKeyName.'[]['.$curKey.']';
                $keyName = $curKey;
                $cnf = $row;
                include __DIR__ . DS . "dialog-obj-edit-form-controll.php";
            } ?>
        <?php echo $elEnd; ?>
    <?php $i++; endforeach; ?>
</div>
<script type="text/javascript">
    pbet.load_collection();
</script>