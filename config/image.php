<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    "index-image-size"=>[
        "large" =>[
            "width" => 800,
            "height" => 600
        ],
        "medium" =>[
            "width" => 400,
            "height" => 300
        ],
        "small" =>[
            "width" => 150,
            "height" => 100
        ],
    ],

    "default-current-index-image"=>"medium"

];
