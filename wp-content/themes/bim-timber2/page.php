<?php

$context = Timber::context();
$context['flexibles'] = get_field('blocs_flexibles', $post);

Timber::render('page.twig', $context);