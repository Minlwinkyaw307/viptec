<?php

return [
    'dashboard' => [
        'name' => 'Dashboard',
        'route' => 'admin.index',
        'icon' => 'ti-home',
    ],
    'products' => [
        'name' => 'Products',
        'route' => 'admin.product.index',
        'icon' => 'ti-home',
    ],
    'categories' => [
        'name' => 'Categories',
        'route' => 'admin.category.index',
    ],
    'features' => [
        'name' => 'Features',
        'route' => 'admin.feature.index',
    ],
    'package' => [
        'name' => 'Package Types',
        'route' => 'admin.package-type.index',
    ],
    'blog' => [
        'name' => 'Blogs',
        'route' => 'admin.blog.index',
    ],
    'faq' => [
        'name' => 'FAQ',
        'route' => 'admin.faq.index',
    ],
    'contact-message' => [
        'name' => 'Contact Message',
        'route' => 'admin.contact-message.index',
    ],
    'configs' => [
        'name' => 'Site Configs',
        'icon' => 'ti-home',
        'children' => [
            [
                'name' => 'Home Page',
                'route' => 'admin.config.home.edit',
            ],
            [
                'name' => 'Slider',
                'route' => 'admin.slider.index',
            ],
            [
                'name' => 'Certificate',
                'route' => 'admin.certificate.index',
            ],
            [
                'name' => 'Gallery',
                'route' => 'admin.gallery.index',
            ],
            [
                'name' => 'Settings',
                'route' => 'admin.config.setting.edit',
            ]
        ]
    ]
];
