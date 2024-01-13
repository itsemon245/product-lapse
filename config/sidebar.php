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
                "name" => 'product-category.index',
            ],
            (object) [
                'label' => 'Stage',
                "name" => 'product-stage.index',
            ],
            (object) [
                'label' => 'Invitation',
                "name" => 'invitation.index',
            ],
            (object) [
                'label' => 'Idea',
                "name" => 'idea.index',
            ],
            (object) [
                'label' => 'Task',
                "name" => 'task.index',
            ],
            (object) [
                'label' => 'Support',
                "name" => 'support.index',
            ],
            (object) [
                'label' => 'Documents',
                "name" => 'document.index',
            ],

        ]
    ],
    'Change Request' => (object) [
        "name" => 'change.index',
        'icon' => '<span class="ti-panel"></span>',
        'hasSubMenu' => false,
    ],
    'Delivery' => (object) [
        "name" => 'delivery.index',
        'icon' => '<span class="ti-panel"></span>',
        'hasSubMenu' => false,
    ],
    'Support' => (object) [
        "name" => 'support.index',
        'icon' => '<span class="ti-panel"></span>',
        'hasSubMenu' => false,
    ],
    'Innovate' => (object) [
        "name" => 'idea.index',
        'icon' => '<span class="ti-panel"></span>',
        'hasSubMenu' => false,
    ],
    'Task' => (object) [
        "name" => 'task.index',
        'icon' => '<span class="ti-panel"></span>',
        'hasSubMenu' => false,
    ],
    'Report' => (object) [
        "name" => 'report.index',
        'icon' => '<span class="ti-panel"></span>',
        'hasSubMenu' => false,
    ],
    'Document' => (object) [
        "name" => 'document.index',
        'icon' => '<span class="ti-panel"></span>',
        'hasSubMenu' => false,
    ],

];