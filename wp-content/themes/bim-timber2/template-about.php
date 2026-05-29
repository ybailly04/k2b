<?php /* Template Name: A propos */

$context = Timber::context();
$context["fields"] = get_fields($post);

Timber::render("about.twig", $context);
