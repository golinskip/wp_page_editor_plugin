    #<?php echo $obj['id'];?> .wtst-pb-text-image-link {
	text-align:<?php echo $cnf['align'] ?>;
    }
    #<?php echo $obj['id'];?> img {
	width: auto;
        height:140px;
    }
<?php if ($cnf['urlType'] == 3): ?>
    #<?php echo $obj['id'];?> .circle strong {
        color: <?php echo $cnf['ring_color']; ?>;
    }
<?php endif; ?>
