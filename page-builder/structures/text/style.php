    #<?php echo $obj['id'];?> .wtst-pb-struct-text-box {
	    text-align:<?php echo $cnf['align'] ?>;
        /*font-size:<?php echo $cnf['font_size']; ?>;*/
    }
    #<?php echo $obj['id'];?> {
        <?php 
        if(strlen($cnf['margin_top']) > 0) {
            echo '          margin-top:'.$cnf['margin_top'].';'."\n";
        }
        if(strlen($cnf['margin_left']) > 0) {
            echo '          margin-left:'.$cnf['margin_left'].';'."\n";
        }
        if(strlen($cnf['margin_right']) > 0) {
            echo '          margin-right:'.$cnf['margin_right'].';'."\n";
        }
        if(strlen($cnf['margin_bottom']) > 0) {
            echo '          margin-bottom:'.$cnf['margin_bottom'].';'."\n";
        }
        ?>
    }