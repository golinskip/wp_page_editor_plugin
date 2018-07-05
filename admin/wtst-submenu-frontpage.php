<?php

function Wtst_Submenu_Frontpage() {
    $wtst_page_builder_backend = new wtst_page_builder_backend();
    $wtst_page_builder_backend->init();
    include __DIR__ . DS . 'theme' . DS . 'frontpage-theme.php';
}
