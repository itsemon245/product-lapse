<?php

return [
    'Dashboard'   => (object) [
        "name"       => 'admin',
        'icon'       => '<span class="ti-microsoft"></span>',
        'hasSubMenu' => false,
     ],
    'Package'     => (object) [
        "name"       => 'package.index',
        'icon'       => '<span class="ti-package"></span>',
        'hasSubMenu' => true,
        'submenu'    => [
            'View All' => 'package.index',
            'View Features' => 'package-feature.index',
         ],
     ],
    'Certificate' => (object) [
        "name"       => 'admin.certificate',
        'icon'       => '<span class="ti-package"></span>',
        'hasSubMenu' => false,
     ],
    'Intro'       => (object) [
        "name"       => 'edit.intro',
        'icon'       => '<span class="ti-package"></span>',
        'hasSubMenu' => false,
     ],
    'About Us'    => (object) [
        "name"       => 'edit.about_us',
        'icon'       => '<span class="ti-package"></span>',
        'hasSubMenu' => false,
     ],
    'Contact Us'  => (object) [
        "name"       => 'edit.contact.us',
        'icon'       => '<span class="ti-package"></span>',
        'hasSubMenu' => false,
     ],
    'Faqs'        => (object) [
        "name"       => 'faqs.index',
        'icon'       => '<span class="ti-package"></span>',
        'hasSubMenu' => false,
     ],
    'Feature'     => (object) [
        "name"       => 'features.index',
        'icon'       => '<span class="ti-package"></span>',
        'hasSubMenu' => false,
     ],
     'Users Management'     => (object) [
        "name"       => 'users.index',
        'icon'       => '<span class="ti-user"></span>',
        'hasSubMenu' => false,
     ],
 ];
