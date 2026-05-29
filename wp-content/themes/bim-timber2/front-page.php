<?php

$context = Timber::context();
$context["fields"] = get_fields();

Timber::render("homepage.twig", $context);
