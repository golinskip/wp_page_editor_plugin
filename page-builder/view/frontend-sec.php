<?php
if (!defined('WPINC')) {
    die;
}
$secCounter = 0;
$colCounter = 0;
$objCounter = 0;
?>
<?php if (isset($obj['sec']) && is_array($obj['sec']) && count($obj['sec']) > 0): ?>
    <?php foreach ($obj['sec'] as $sec): ?>
        <?php
            global $defaultCnf;
            $sec['cnf'] = array_merge($defaultCnf['sec'], $sec['cnf']);
            $secCounter++;
            $secId = 'sec-'.$secCounter;
            ob_start();
            include(__DIR__ . DS . 'frontend-sec-css.php');
            $frontendCss .= ob_get_clean();
            $class='container';
            $bgClass = '';
            $bgAdditionals = '';
            $secClass = '';
            if($sec['cnf']['width'] == cnf_opts::COL_WIDTH_LL) {
                $class.='-fluid';
            }
            
            // Styl tekstu
            switch($sec['cnf']['txtstyle']) {
                case cnf_opts::TXT_STYLE_LIGHT:
                    $class.=' text-light';
                    break;
                case cnf_opts::TXT_STYLE_DARK:
                    $class.=' text-dark';
                    break;
            }
            
            // wysokość 
            switch($sec['cnf']['height']) {
                case cnf_opts::HEIGHT_FULL:
                    $secClass.=' vh-100';
                    break;
                case cnf_opts::HEIGHT_75: 
                    $secClass.=' vh-75';
                    break;
                case cnf_opts::HEIGHT_50:
                    $secClass.=' vh-50';
                    break;
                case cnf_opts::HEIGHT_25:
                    $secClass.=' vh-25';
                    break;
            }
            
            // Efekt paralaksy
            if($sec['cnf']['bgstyle'] == cnf_opts::BG_STYLE_PARALLAX) {
                $image = wp_get_attachment_image_src($sec['cnf']['bgimage'], 'full');
                if ($image) {
                    list($src, $width, $height) = $image;
                }
                $bgAdditionals = 'data-parallax="scroll" data-image-src="'.$src.'" data-speed="'.$sec['cnf']['parallax_speed'].'"';
                $bgClass=' parallax-window';   
                wp_enqueue_script('jquery-parallax', plugin_dir_url(__FILE__) . '../js/parallax.min.js', array(), false, true);
            }
            wp_enqueue_script('jquery-scrollify', plugin_dir_url(__FILE__) . '../js/jquery.scrollify.js', array(), false, true); 
            
            // Czy oklasowana ma być sekcja czy container
            $bgFull = ($sec['cnf']['width'] == cnf_opts::COL_WIDTH_LL || $sec['cnf']['width'] == cnf_opts::COL_WIDTH_LW)?1:0;
        ?>
        <section class="fullwidth-section<?php
                echo $secClass; 
                if($secCounter == 1){
                    echo ' visible'; 
                }
                if($bgFull){
                    echo $bgClass;
                }
                if($sec['cnf']['scrollify'] == cnf_opts::YES) {
                    echo ' scrollify';
                }
            ?>" <?php if($bgFull) echo 'id="'.$secId.'" '.$bgAdditionals; ?>>
            <div class="<?php echo $class; if(!$bgFull) echo $bgClass; ?>" <?php if(!$bgFull) echo 'id="'.$secId.'" '.$bgAdditionals; ?>>
                <?php if ($sec['cnf']['anchor'] != null):?>
                    <a id="<?php echo $sec['cnf']['anchor']; ?>"></a>
                <?php endif; ?>
                <div class="row">
                    <?php include(__DIR__ . DS . 'frontend-col.php'); ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>
