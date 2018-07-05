<?php
if (!defined('WPINC')) {
    die;
}

$objCounter = 0;
$frontendCss = "";

ob_start();
include(__DIR__.DS.'frontend-sec.php');
$frontendHtml = ob_get_clean();
?>