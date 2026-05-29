<?php

function bim_register_menus()
{
    register_nav_menus([
        "menu-header" => "Menu Principal",
        "menu-footer" => "Menu Footer",
    ]);
}

add_action("init", "bim_register_menus");
