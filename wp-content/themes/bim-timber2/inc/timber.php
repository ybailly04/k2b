<?php

Timber\Timber::$dirname = ["templates", "views"];
Timber\Timber::$autoescape = false;

class BimSite extends Timber\Site
{
    public function __construct()
    {
        add_action("after_setup_theme", [$this, "theme_supports"]);
        add_filter("timber/context", [$this, "add_to_context"]);
        add_filter("timber/twig", [$this, "add_to_twig"]);
        parent::__construct();
    }

    public function add_to_context($context)
    {
        $context["site"] = $this;
        $context["menus"] = [
            "menu-header" => Timber::get_menu("menu-header"),
            "menu-footer" => Timber::get_menu("menu-footer"),
        ];
        $context["links"] = [];
        $context["options"] = [];

        return $context;
    }

    public function theme_supports()
    {
        add_theme_support("automatic-feed-links");
        add_theme_support("title-tag");
        add_theme_support("post-thumbnails");
        add_theme_support("menus");
        add_theme_support("html5", [
            "comment-form",
            "comment-list",
            "gallery",
            "caption",
        ]);
    }

    public function theme_image($name)
    {
        return get_stylesheet_directory_uri() . "/dist/img/" . $name;
    }

    public function add_to_twig($twig)
    {
        $twig->addExtension(new Twig\Extension\StringLoaderExtension());
        $twig->addFilter(
            new Twig\TwigFilter("theme_image", [$this, "theme_image"]),
        );
        return $twig;
    }
}

new BimSite();
