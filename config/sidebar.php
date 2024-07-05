<?php

return [
    'Dashboard' => (object) [
        'name' => 'admin',
        'icon' => '<span class="ti-microsoft"></span>',
        'hasSubMenu' => false,
    ],
    'Package' => (object) [
        'name' => 'package.index',
        'icon' => '<span class="ti-package"></span>',
        'hasSubMenu' => true,
        'submenu' => [
            'View Packages' => (object) [
                'name' => 'package.index',
                'icon' => '<span class="ti-package"></span>',
                'hasSubMenu' => false,
            ],
            'View Features' => (object) [
                'name' => 'package-feature.index',
                'icon' => '<span class="ti-package"></span>',
                'hasSubMenu' => false,
            ],
        ],
    ],
    'Certificate' => (object) [
        'name' => 'admin.certificate',
        'icon' => '<span class="ti-id-badge"></span>',
        'hasSubMenu' => false,
    ],
    'Frontend' => (object) [
        'name' => 'home',
        'icon' => '<span class="ti-layout"></span>',
        'hasSubMenu' => true,
        'submenu' => [
            'Intro' => (object) [
                'name' => 'edit.intro',
                'icon' => '<span class="ti-home"></span>',
                'hasSubMenu' => false,
            ],
            'About Us' => (object) [
                'name' => 'edit.about_us',
                'icon' => '<span class="ti-info-alt"></span>',
                'hasSubMenu' => false,
            ],
            'Contact Us' => (object) [
                'name' => 'edit.contact.us',
                'icon' => '<span class="ti-headphone-alt"></span>',
                'hasSubMenu' => false,
            ],
            'Faqs' => (object) [
                'name' => 'faqs.index',
                'icon' => '<span class="ti-help-alt"></span>',
                'hasSubMenu' => false,
            ],
            'Feature' => (object) [
                'name' => 'features.index',
                'icon' => '<span class="ti-flag-alt"></span>',
                'hasSubMenu' => false,
            ],
            'Privacy Policy' => (object) [
                'name' => 'page.edit',
                'params' => ['key' => 'page', 'value' => 1],
                'icon' => '<span class="ti-file"></span>',
                'hasSubMenu' => false,
            ],
            'Terms & Conditions' => (object) [
                'name' => 'page.edit',
                'params' => ['key' => 'page', 'value' => 2],
                'icon' => '<span class="ti-book"></span>',
                'hasSubMenu' => false,
            ],
            'Technical Support' => (object) [
                'name' => 'page.edit',
                'params' => ['key' => 'page', 'value' => 3],
                'icon' => '<span class="ti-support"></span>',
                'hasSubMenu' => false,
            ],
        ],
    ],
    'Contact Messages' => (object) [
        'name' => 'contact.messages',
        'icon' => '<span class="ti-comment-alt"></span>',
        'hasSubMenu' => false,
    ],
    'Users Management' => (object) [
        'name' => 'users.index',
        'icon' => '<span class="ti-user"></span>',
        'hasSubMenu' => false,
    ],
    'Order Manage' => (object) [
        'name' => 'admin.order.index',
        'icon' => '<span class="ti-stats-up"></span>',
        'hasSubMenu' => false,
    ],
    'Logs' => (object) [
        'name' => 'admin.logs',
        'icon' => '<span class="ti-server"></span>',
        'hasSubMenu' => false,
    ],
];
