#<?php echo $objct['id'];?> {
    margin-top:<?php echo $objct['cnf']['margin_top'] ?><?php echo $objct['cnf']['margin_unit'] ?>;
    margin-bottom:<?php echo $objct['cnf']['margin_bottom'] ?><?php echo $objct['cnf']['margin_unit'] ?>;
    margin-left:<?php echo $objct['cnf']['margin_left'] ?><?php echo $objct['cnf']['margin_unit'] ?>;
    margin-right:<?php echo $objct['cnf']['margin_right'] ?><?php echo $objct['cnf']['margin_unit'] ?>;
    <?php if(isset($objct['cnf']['padding_top'])):?>padding-top:<?php echo $objct['cnf']['padding_top']; ?><?php echo $objct['cnf']['padding_unit'] ?>;<?php endif; ?>

    <?php if(isset($objct['cnf']['padding_bottom'])):?>padding-bottom:<?php echo $objct['cnf']['padding_bottom']; ?><?php echo $objct['cnf']['padding_unit'] ?>;<?php endif; ?>

    <?php if(isset($objct['cnf']['padding_left'])):?>padding-left:<?php echo $objct['cnf']['padding_left']; ?><?php echo $objct['cnf']['padding_unit'] ?>;<?php endif; ?>

    <?php if(isset($objct['cnf']['padding_right'])):?>padding-right:<?php echo $objct['cnf']['padding_right']; ?><?php echo $objct['cnf']['padding_unit'] ?>;<?php endif; ?>

}