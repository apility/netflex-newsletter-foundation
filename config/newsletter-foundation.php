<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Placement of custom styles file (blade files)
    |--------------------------------------------------------------------------
    |
    | Do not include .blade.php. Files are automatically inlined in
    | foundation template.
    |
    */

    'css_paths' => [
        'netflex-newsletter-foundation::styles/foundation',
        'netflex-newsletter-foundation::styles/custom'
    ],

    /*
    |--------------------------------------------------------------------------
    | Background colors
    |--------------------------------------------------------------------------
    |
    | Custom color selector will be automatically added to theme color list.
    |
    */

    'background_colors' => [
        '#ffffff' => 'Hvit',
        '#000000' => 'Sort',
        '#333333' => 'Mørk grå',
    ],

    /*
    |--------------------------------------------------------------------------
    | Text colors
    |--------------------------------------------------------------------------
    |
    | For light and dark backgrounds.
    |
    */

    'text_colors' => [
        'dark_bg' => '#ffffff',
        'light_bg' => '#000000'
    ],

    /*
    |--------------------------------------------------------------------------
    | Button sizes
    |--------------------------------------------------------------------------
    |
    | Set sizes array, and set padding and font sizes according to the sizes
    | set above.
    |
    */

    'button' => [
        'sizes' => [
            'small' => 'Litem',
            'medium' => 'Medium',
            'large' => 'Stor',
        ],
        'padding' => [
            'small' => '5px 10px',
            'medium' => '8px 16px',
            'large' => '10px 20px',
        ],
        'font_size' => [
            'small' => '12px',
            'medium' => '14px',
            'large' => '18px',
        ],
    ],

     /*
    |--------------------------------------------------------------------------
    | Image formats
    |--------------------------------------------------------------------------
    |
    | Should always be in format w:h proportions, not in pixels.
    | Custom will be automatically added to format list.
    */

    'image_formats' => [
        '4:3' => '4:3 - normalt liggende bildeformat',
        '3:4' => '3:4 - normalt stående bildeformat',
        '4:5' => '4:5 - portrettfoto standard',
        '16:9' => '16:9 - avlangt format',
        '9:16' => '9:16 - stående høyt format',
        '1:1' => '1:1 - kvadratisk',
    ],

    /*
    |--------------------------------------------------------------------------
    | Models for insertion in entry list component
    |--------------------------------------------------------------------------
    |
    | Must implement Contracts\NewsletterEntryListContract
    |
    */

    'entry_list' => [
        'models' => []
    ],

    /*
    |--------------------------------------------------------------------------
    | Template defaults
    |--------------------------------------------------------------------------
    |
    | If you change sizing settings like widths or paddings, be sure to
    | test all components properly on all device sizes in a testing tool like
    | litmus or emailonacid. E-mail clients behave badly.
    |
    */

    'defaults' => [
        'content' => [
            'title' => 'Lorem Ipsum Dolor',
            'paragraph' => '
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Nullam eget diam vel mauris lobortis iaculis at ac justo. 
                    Duis vel ipsum sed turpis interdum auctor.
                </p>
            ',
            'background' => '#ffffff',
            'padding' => 10,
        ],
        'body' => [
            'background' => 'f6f6f6',
            'width' => 640,
            'padding' => 10,
        ],
        'grid' => [
            'grid-2-responsive' => true
        ],
        'toolbar' => [
            'background' => '#dfdfdf',
            'padding' => 8,
            'width' => 640,
        ],
        'button' => [
            'background' => '#000000',
            'border' => 'none',
            'border_radius' => 0,
            'padding' => 'medium',
            'font_size' => 'medium',
            'font_weight' => 'bold',
            'text' => 'Les mer &rarr;',
            'class' => 'button',
        ],
        'entry_list' => [
            'setup' => 'twoColumns'
        ],
        'rule' => [
            'background' => '#000000',
            'height' => 5
        ],
    ]
];
