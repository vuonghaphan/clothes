<?php

return [
    'offline'        => env('ASSETS_OFFLINE', true),
    'enable_version' => env('ASSETS_ENABLE_VERSION', false),
    'version'        => env('ASSETS_VERSION', time()),
    'scripts'        => [
        'modernizr',
        'app',
        'jquery-3.2.1',
        'animsition',
        'popper',
        'bootstrap',
        'select2',
        'moment',
        'daterangepicker',
        'slick',
        'slick-custom',
        'parallax100',
        'jquery.magnific-popup',
        'isotope.pkgd',
        'sweetalert',
        'perfect-scrollbar',
        'main',
    ],
    'styles'         => [
        'bootstrap',
        'font-awesome',
        'material-design-iconic-font',
        'icon-font',
        'animate',
        'hamburgers',
        'animsition',
        'select2',
        'daterangepicker',
        'slick',
        'magnific-popup',
        'perfect-scrollbar',
        'util',
        'main',

    ],
    'resources'      => [
        'scripts' => [
            'jquery-3.2.1' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                  'local' => 'assets/client/vendor/jquery/jquery-3.2.1.min.js',
                ]
            ],
            'animsition' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/animsition/js/animsition.min.js',
                ]
            ],
            'popper' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/bootstrap/js/popper.js',
                ]
            ],
            'bootstrap' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/bootstrap/js/bootstrap.min.js',
                ]
            ],
            'select2' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/select2/select2.min.js',
                ]
            ],
            'moment' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/daterangepicker/moment.min.js',
                ]
            ],
            'daterangepicker' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/daterangepicker/daterangepicker.js',
                ]
            ],
            'slick' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/slick/slick.min.js',
                ]
            ],
            'slick-custom' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/js/slick-custom.js',
                ]
            ],
            'parallax100' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/parallax100/parallax100.js',
                ]
            ],
            'jquery.magnific-popup' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/MagnificPopup/jquery.magnific-popup.min.js',
                ]
            ],
            'isotope.pkgd' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/isotope/isotope.pkgd.min.js',
                ]
            ],
            'sweetalert' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/sweetalert/sweetalert.min.js',
                ]
            ],
            'perfect-scrollbar' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/vendor/perfect-scrollbar/perfect-scrollbar.min.js',
                ]
            ],
            'main' => [
                'use_cdn' => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/client/js/main.js',
                ]
            ],
        ],
        'styles'  => [
            'bootstrap' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/bootstrap/css/bootstrap.min.css',
                ]
            ],
            'font-awesome' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
                ]
            ],
            'material-design-iconic-font' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/fonts/iconic/css/material-design-iconic-font.min.css',
                ]
            ],
            'icon-font' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/fonts/linearicons-v1.0.0/icon-font.min.css',
                ]
            ],
            'animate' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/animate/animate.css',
                ]
            ],
            'hamburgers' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/css-hamburgers/hamburgers.min.css',
                ]
            ],
            'animsition' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/animsition/css/animsition.min.css',
                ]
            ],
            'select2' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/select2/select2.min.css',
                ]
            ],
            'daterangepicker' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/daterangepicker/daterangepicker.css',
                ]
            ],
            'slick' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/slick/slick.css',
                ]
            ],
            'magnific-popup' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/MagnificPopup/magnific-popup.css',
                ]
            ],
            'perfect-scrollbar' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/vendor/perfect-scrollbar/perfect-scrollbar.css',
                ]
            ],
            'util' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/css/util.css',
                ]
            ],
            'main' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => 'assets/client/css/main.css',
                ]
            ],
        ],
    ],
];
