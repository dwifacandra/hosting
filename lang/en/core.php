<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    'dashboard'       => [
        'label'       => 'Dashboard',
        'icon'        => 'heroicon-m-home',
        'icon_active' => 'heroicon-m-home',
    ],
    /*
    |--------------------------------------------------------------------------
    | Access Management
    |--------------------------------------------------------------------------
    */
    'access'          => [
        'label'       => 'Access Management',
        'icon'        => 'fill.lock_clock',
        'icon_active' => 'outline.lock_clock',
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
        'icon'        => 'fluentui-image-shadow-24',
        'icon_active' => 'fluentui-image-shadow-24',
        'core_icon'      => [
            'label'       => 'Icons',
            'title'       => 'Icons',
            'heading'     => 'Icons',
            'subheading'  => '',
            'icon'        => 'fluentui-image-shadow-24',
            'icon_active' => 'fluentui-image-shadow-24',
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
