<?php
include __DIR__ . DS . 'cnf.php';
include __DIR__ . DS . 'class' . DS . 'class-wtst-page-builder-form.php';
include __DIR__ . DS . 'class' . DS . 'class-wtst-page-builder-converter.php';
include __DIR__ . DS . 'class' . DS . 'class-wtst-page-builder-backend.php';
include __DIR__ . DS . 'class' . DS . 'class-wtst-page-builder-ajax.php';
include __DIR__ . DS . 'class' . DS . 'class-wtst-page-builder-structures.php';
include __DIR__ . DS . 'class' . DS . 'class-wtst-page-builder-database.php';
include __DIR__ . DS . 'class' . DS . 'class-wtst-page-builder-frontend.php';

// Hook basic structures
$structDir = dirname(__FILE__).DS.'structures';
foreach (scandir($structDir) as $dirname) {
    $curDir = $structDir.DS.$dirname;
    if (!is_dir($curDir) || $dirname=='.' || $dirname == '..') {
        continue;
    }
    wtst_page_builder_structures::hook($curDir);
}

function wtst_pb_install() {
    
    // Install database
    $wtst_page_builder_database = new wtst_page_builder_database();
    $wtst_page_builder_database->install();
}

function wtst_pb_init() {

    // Init ajax actions
    $wtst_page_builder_ajax = new wtst_page_builder_ajax();
    $wtst_page_builder_ajax->init();
}
