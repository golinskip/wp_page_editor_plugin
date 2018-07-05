<?php

function Wtst_Submenu() {
        add_menu_page(
                __('Whitesite theme', 'wtst'), // the page title
                __('Whitesite theme', 'wtst'), //menu title
                'edit_themes', //capability 
                'wtst-setup', //menu slug/handle this is what you need!!!
                'Wtst_Submenu_Settings',
                'dashicons-art', //icon_url,
                '2'//position
        );
        add_submenu_page(
                'wtst-setup',
                __('Front page', 'wtst'),
                __('Front page', 'wtst'),
                'edit_themes',
                'wtst-frontpage',
                'Wtst_Submenu_Frontpage'
        );
}