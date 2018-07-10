
<?php if (isset($col['obj']) && is_array($col['obj']) && count($col['obj']) > 0): ?>
    <?php foreach ($col['obj'] as $objct): $objCounter ++; ?>
        <?php
            ob_start();
            include(__DIR__ . DS . 'frontend-obj-css.php');
            $frontendCss .= ob_get_clean();
        ?>
        <div id="<?php echo $objct['id']; ?>" class="wtst-pb-object" <?php if(isset($objct['cnf']['aos_animation']) && $objct['cnf']['aos_animation']!= 'none') {
          echo 'data-aos="'.$objct['cnf']['aos_animation'].'"';
        }?>>
            <?php echo wtst_page_builder_structures::get_structure_code($objct['type'], 'frontend', $objct['cnf'], $objCounter); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>