#<?php echo $objct['id'];?> {
    margin-top:<?php echo $objct['cnf']['margin_top'] ?>px;
    margin-bottom:<?php echo $objct['cnf']['margin_bottom'] ?>px;
    margin-left:<?php echo $objct['cnf']['margin_left'] ?>px;
    margin-right:<?php echo $objct['cnf']['margin_right'] ?>px;
    <?php if(isset($objct['cnf']['padding_top'])):?>padding-top:<?php echo $objct['cnf']['padding_top']; ?>px;<?php endif; ?>

    <?php if(isset($objct['cnf']['padding_bottom'])):?>padding-bottom:<?php echo $objct['cnf']['padding_bottom']; ?>px;<?php endif; ?>

    <?php if(isset($objct['cnf']['padding_left'])):?>padding-left:<?php echo $objct['cnf']['padding_left']; ?>px;<?php endif; ?>

    <?php if(isset($objct['cnf']['padding_right'])):?>padding-right:<?php echo $objct['cnf']['padding_right']; ?>px;<?php endif; ?>

}