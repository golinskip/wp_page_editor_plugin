<?php
if (!defined('WPINC')) {
    die;
}
$tabs = [];
foreach($formData as $element) {
    $found = false;
    foreach($tabs as $tab) {
        if($tab == $element['tab']) {
            $found = true;
            break;
        }
    }
    if(!$found) {
        $key = preg_replace("/[^A-Za-z0-9 ]/", '-', strtolower($element['tab']));
        $tabs[$key] = $element['tab'];
    }
}
?>
<div id="tabs">
  <ul>
    <?php foreach($tabs as $tabKey=>$tab): ?>
        <li><a href="#<?php echo $tabKey;?>"><?php echo $tab;?></a></li>
    <?php endforeach; ?>
</ul>

<?php foreach($tabs as $tabKey => $tab): ?>
    <div id="<?php echo $tabKey?>">
    <?php foreach($formData as $element): if($element['tab'] != $tab) continue;?>
        <?php
            
        ?>
    <?php endforeach; ?>
    </div>
<?php endforeach; ?>
</div>

<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
</script>