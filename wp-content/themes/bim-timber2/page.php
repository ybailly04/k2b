<?php

$context = Timber::context();
$context["fields"] = get_fields($post);

Timber::render("page.twig", $context);
