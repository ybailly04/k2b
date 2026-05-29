<?php

function bim_add_scripts()
{
    $manifest_path = get_stylesheet_directory() . "/dist/.vite/manifest.json";
    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
        wp_enqueue_script(
            "bim",
            get_template_directory_uri() . "/dist/" . $manifest["assets/js/app.js"]["file"],
            null,
            null,
            true,
        );
    }

    wp_localize_script("bim", "ajaxUrl", [admin_url("admin-ajax.php")]);
    wp_localize_script("bim", "iconsSvg", [get_stylesheet_directory_uri() . "/dist/img/all-icons.svg"]);
}

function bim_add_styles()
{
    $manifest_path = get_stylesheet_directory() . "/dist/.vite/manifest.json";
    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
        wp_enqueue_style(
            "bim",
            get_template_directory_uri() . "/dist/" . $manifest["assets/css/style.scss"]["file"],
            null,
            null,
        );
    }
}

add_action("wp_footer", "bim_add_scripts", 10);
add_action("wp_enqueue_scripts", "bim_add_styles", 80);

// ============================================
// Disable unneeded Wordpress scripts
// ============================================
function bim_deregister_scripts()
{
    wp_deregister_script("wp-embed");
    if (!is_admin()) {
        wp_deregister_script("jquery");
        wp_register_script("jquery", false);
    }
}

function bim_dequeue_styles() {}

add_action("wp_footer", "bim_deregister_scripts");
add_action("wp_enqueue_scripts", "bim_dequeue_styles", 80);

remove_action("wp_head", "print_emoji_detection_script", 7);
remove_action("wp_print_styles", "print_emoji_styles");
remove_action("wp_head", "wp_generator");
remove_action("wp_enqueue_scripts", "wp_enqueue_global_styles");
remove_action("wp_footer", "wp_enqueue_global_styles", 1);

add_filter("wpcf7_autop_or_not", "__return_false");

add_filter("gform_phone_formats", "fr_phone_format");
function fr_phone_format($phone_formats)
{
    $phone_formats["fr"] = [
        "label" => "FR",
        "mask" => false,
        "regex" => '/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/',
        "instruction" => "Veuillez saisir un format de téléphone valide",
    ];

    return $phone_formats;
}
