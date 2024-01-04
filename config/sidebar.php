<?php

return [
    'Dashboard' => (object) [
        "name" => 'dashboard',
        'icon' => '<span class="ti-microsoft"></span>',
        'hasSubMenu' => false,
    ],
    'Package' => (object) [
        "name" => 'package.index',
        'icon' => '<span class="ti-package"></span>',
        'hasSubMenu' => false,
    ],
    'Product' => (object) [
        "name" => 'product.index',
        'icon' => '<span class="ti-package"></span>',
        'hasSubMenu' => true,
        'subMenu' => (object) [
            (object) [
                'label' => 'Product',
                "name" => 'product.index',
            ],
            (object) [
                'label' => 'Category',
                "name" => 'product.index',
            ],
            (object) [
                'label' => 'Stage',
                "name" => 'product.index',
            ],
        ]
    ],

];