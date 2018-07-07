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
    $prototype = '<div class="wtst-pb-collection-el"><h3><span class="remove">x</span></h3><div class="wtst-pb-collection-el-body">';
    foreach($rootElement['components'] as $curKey => $element){
        $inputName = $rootKeyName.'[]['.$curKey.']';
        $keyName = $curKey;
        ob_start();
        include __DIR__ . DS . "dialog-obj-edit-form-controll.php";
        $prototype.=ob_get_clean();
    }
    $prototype.= '</div></div>';
?>
</pre>
<div class="wtst-pb-collection-buttons">
    <input id="wtst-pb-collection-button-add" type="button" value="<?php echo __('Add', 'wtst');?> +" data-prototype="<?php echo htmlentities( $prototype );?>">
</div>
<div id="wtst-pb-collection-canvas">
    <?php $i=0; foreach($rootCurrentValue as $row): ?>
    <div class="wtst-pb-collection-el">
        <h3><span class="remove">x</span></h3>
        <div class="wtst-pb-collection-el-body">
            <?php foreach($rootElement['components'] as $curKey => $element) {
                $inputName = $rootKeyName.'[]['.$curKey.']';
                $keyName = $curKey;
                $cnf = $row;
                include __DIR__ . DS . "dialog-obj-edit-form-controll.php";
            } ?>
        </div>
    </div>
    <?php $i++; endforeach; ?>
</div>
<script type="text/javascript">
    jQuery( document ).ready(function( $ ) {
        $( function() {
            $( "#wtst-pb-collection-canvas" )
            .accordion({
                header: "> div > h3",
                collapsible: true
            })
            .sortable({
                axis: "y",
                handle: "h3",
                stop: function( event, ui ) {
                // IE doesn't register the blur when sorting
                // so trigger focusout handlers to remove .ui-state-focus
                ui.item.children( "h3" ).triggerHandler( "focusout" );
        
                // Refresh accordion to handle new order
                $( this ).accordion( "refresh" );
                }
            });
        } );
        function remover() {
            $('.wtst-pb-collection-el .remove').unbind().click(function(){
                if(confirm("Are you sure?")) $(this).parent().parent().remove();
            });
        }
        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
            }
        remover();
        $('#wtst-pb-collection-button-add').click(function(){
            var newData = $($(this).attr('data-prototype'));
            var rand = 100 + Math.floor(Math.random() * Math.floor(1000));
            newData.find('.wtst-form-controll').each(function(){
                $(this).attr('id', $(this).attr('id') + rand.toString());
            });
            $('#wtst-pb-collection-canvas').append(newData);
            $('#wtst-pb-collection-canvas').accordion("refresh").sortable("refresh");   
            $('.wtst-pb-collection-el .remove').click(function(){
                if(confirm("Are you sure?")) $(this).parent().parent().remove();
            });
            remover();
        });
        $('.wtst-pb-collection-el')
    });
</script>