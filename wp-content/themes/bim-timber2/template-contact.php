<?php /* Template Name: Contact */

$context = Timber::context();
$context["theme"] = "dark";
$context["fields"] = get_fields($post);

Timber::render("contact.twig", $context);
