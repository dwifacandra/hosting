<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    'dashboard'       => [
        'label'       => 'Dashboard',
        'icon'        => 'outline.home',
        'icon_active' => 'fill.home',
    ],
    /*
    |--------------------------------------------------------------------------
    | Access Management
    |--------------------------------------------------------------------------
    */
    'access'          => [
        'label'       => 'Access Management',
        'icon'        => 'outline.lock_clock',
        'icon_active' => 'fill.lock_clock',
        'users'      => [
            'label'       => 'Users',
            'title'       => 'Users',
            'heading'     => 'Users',
            'subheading'  => '',
            'icon'        => 'outline.frame_person',
            'icon_active' => 'fill.frame_person',
            'field'                 => [
                'username'          => 'Username',
                'firstname'         => 'First Name',
                'lastname'          => 'Last Name',
                'role'              => 'Role',
                'email'             => 'E-Mail',
                'email_verified_at' => 'Verified at',
                'verified'          => 'Verified',
                'unverified'        => 'Unverified',
                'created_at'        => 'Created at',
                'updated_at'        => 'Updated at',
                'deleted_at'        => 'Deleted at',
            ]
        ],
        'roles'      => [
            'label'       => 'Roles & Permissions',
            'title'       => 'Roles & Permissions',
            'heading'     => 'Roles & Permissions',
            'subheading'  => '',
            'icon'        => 'outline.lock_clock',
            'icon_active' => 'fill.lock_clock',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Blog
    |--------------------------------------------------------------------------
    */
    'blog'          => [
        'label'       => 'Blog',
        'icon'        => 'fluentui-image-shadow-24',
        'icon_active' => 'fluentui-image-shadow-24',
    ],
    /*
    |--------------------------------------------------------------------------
    | Collections
    |--------------------------------------------------------------------------
    */
    'collection'          => [
        'label'       => 'Collections',
        'icon'        => 'outline.library_books',
        'icon_active' => 'fill.library_books',
        'core_icon'      => [
            'label'       => 'Icons',
            'title'       => 'Icons',
            'heading'     => 'Icons',
            'subheading'  => '',
            'icon'        => 'outline.fonticons',
            'icon_active' => 'fill.fonticons',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Contents
    |--------------------------------------------------------------------------
    */
    'content'          => [
        'label'       => 'Contents',
        'icon'        => 'outline.deployed_code',
        'icon_active' => 'fill.deployed_code',
        'category'      => [
            'label'       => 'Categories',
            'title'       => 'Categories',
            'heading'     => 'Categories',
            'subheading'  => '',
            'icon'        => 'outline.category',
            'icon_active' => 'fill.category',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Statistics
    |--------------------------------------------------------------------------
    */
    'stats'          => [
        'label'       => 'Statistics',
        'icon'        => 'fluentui-image-shadow-24',
        'icon_active' => 'fluentui-image-shadow-24',
    ],
];
