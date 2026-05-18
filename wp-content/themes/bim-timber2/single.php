<?php

$context = Timber::context();
$context['flexibles'] = get_field('blocs_flexibles', $post);

Timber::render('single.twig', $context);