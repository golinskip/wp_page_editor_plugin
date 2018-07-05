
<?php if (isset($col['obj']) && is_array($col['obj']) && count($col['obj']) > 0): ?>
    <?php foreach ($col['obj'] as $objct): $objCounter ++; ?>
        <div id="<?php echo $objct['id']; ?>">
            <?php echo wtst_page_builder_structures::get_structure_code($objct['type'], 'frontend', $objct['cnf'], $objCounter); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>