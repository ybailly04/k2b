<?php



// ============================================
// Image sizes
// ============================================
set_post_thumbnail_size( 0, 0 );

add_filter( 'timmy/sizes', function( $sizes ) {
    return array(
        'thumbnail' => array(
            'resize' => array( 150, 150, 'center' ),
            'name' => 'Thumbnail',
        ),
        'fullsize' => array(
            'resize' => array( 1920 ),
            'srcset' => array( 0.5, 2 ),
            'sizes' => '100vw',
            'name' => 'Full',
        ),
    );
} );
