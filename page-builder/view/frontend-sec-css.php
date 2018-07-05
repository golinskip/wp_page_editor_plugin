<?php
//$secId - ID sekcji
//$sec['cnf'] - config
?>
#<?php echo $secId; ?> {
    padding-top: <?php echo $sec['cnf']['padding_top']; ?>px;
    padding-bottom: <?php echo $sec['cnf']['padding_bottom']; ?>px;

<?php
    if ($sec['cnf']['transparent'] == cnf_opts::NO) {
        if (strlen($sec['cnf']['bgcolor']) > 3) {
            echo 'background-color: ' . $sec['cnf']['bgcolor'] . ';' . "\n";
        }
        if (is_numeric($sec['cnf']['bgimage']) && $sec['cnf']['bgimage'] > 0) {
            $image = wp_get_attachment_image_src($sec['cnf']['bgimage'], 'full');
            if ($image) {
                list($src, $width, $height) = $image;
            }
            echo 'background-image: url(\'' . $src . '\');' . "\n";
            switch($sec['cnf']['bgstyle']){
                case cnf_opts::BG_STYLE_CENTER: {
                    echo 'background-repeat: no-repeat;' . "\n";
                    echo 'background-position: center center;' . "\n";
                    break;
                }
                case cnf_opts::BG_STYLE_TOP_LEFT: {
                    echo 'background-repeat: no-repeat;' . "\n";
                    echo 'background-position: 0 0;' . "\n";
                    break;
                }
                case cnf_opts::BG_STYLE_COVER: {
                    echo 'background-size: cover;' . "\n";
                    break;
                }
                case cnf_opts::BG_STYLE_REPEAT: {
                    echo 'background-repeat: repeat;' . "\n";
                    break;
                }
                case cnf_opts::BG_STYLE_BOTTOM: {
                    echo 'background-size: cover;' . "\n";
                    echo 'background-repeat: no-repeat;' . "\n";
                    echo 'background-position: bottom;' . "\n";
                    break;
                }
            }
        }
    }
?>

}

