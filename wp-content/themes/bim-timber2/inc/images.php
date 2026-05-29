<?php

// ============================================
// Image sizes
// ============================================
set_post_thumbnail_size(0, 0);

add_filter("timmy/sizes", function ($sizes) {
    return [
        "thumbnail" => [
            "resize" => [150, 150, "center"],
            "name" => "Thumbnail",
        ],
        "fullsize" => [
            "resize" => [1920],
            "srcset" => [0.5, 2],
            "sizes" => "100vw",
            "name" => "Full",
            "webp" => true,
        ],
        "portrait" => [
            "resize" => [550, 715, true],
            "srcset" => [0.5, 2],
            "name" => "Portrait",
            "webp" => true,
        ],
        "square" => [
            "resize" => [800, 800, true],
            "srcset" => [0.5, 2],
            "name" => "Square",
            "webp" => true,
        ],
    ];
});
