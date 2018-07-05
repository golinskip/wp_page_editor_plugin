<?php
//$colId - ID sekcji
//$col['cnf'] - config
?>
#<?php echo $colId; ?> {

<?php
    if ($col['cnf']['transparent'] == cnf_opts::NO) {
        if (strlen($col['cnf']['bgcolor']) > 3) {
            echo 'background-color: ' . $col['cnf']['bgcolor'] . ';' . "\n";
        }
        if (is_numeric($col['cnf']['bgimage']) && $col['cnf']['bgimage'] > 0) {
            $image = wp_get_attachment_image_src($col['cnf']['bgimage'], 'full');
            if ($image) {
                list($src, $width, $height) = $image;
            }
            echo 'background-image: url(\'' . $src . '\');' . "\n";
            switch($col['cnf']['bgstyle']){
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