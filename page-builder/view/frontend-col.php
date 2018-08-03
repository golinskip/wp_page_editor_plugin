<?php if (isset($sec['col']) && is_array($sec['col']) && count($sec['col']) > 0): ?>
    <?php foreach ($sec['col'] as $col): ?>
        <?php
            global $defaultCnf;
            $col['cnf'] = array_merge($defaultCnf['col'], $col['cnf']);
            $colCounter++;
            $colId = 'col-'.$colCounter;
            ob_start();
            include(__DIR__ . DS . 'frontend-col-css.php');
            $frontendCss .= ob_get_clean();
            $class= 'col-md-'.$col['cnf']['size'];
            switch($col['cnf']['txtstyle']) {
                case cnf_opts::TXT_STYLE_LIGHT:
                    $class.=' text-light';
                    break;
                case cnf_opts::TXT_STYLE_DARK:
                    $class.=' text-dark';
                    break;
            }
            if($col['cnf']['margin'] == cnf_opts::NO) {
                //$class.=' pl-0 pr-0';
            }
            
        ?>
        <div id="<?php echo $colId; ?>" class="<?php echo $class; ?>">
            <?php include(__DIR__ . DS . 'frontend-obj.php') ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>