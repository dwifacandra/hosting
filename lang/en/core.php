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
        'animation'       => [
            'label'       => 'Animation',
            'title'       => 'Animation',
            'heading'     => 'Animation',
            'subheading'  => '',
            'icon'        => 'outline.motion_photos_auto',
            'icon_active' => 'fill.motion_photos_auto',
        ],
        'photograph'      => [
            'label'       => 'Photograph',
            'title'       => 'Photograph',
            'heading'     => 'Photograph',
            'subheading'  => '',
            'icon'        => 'outline.photo_library',
            'icon_active' => 'fill.photo_library',
        ],
        'core_icon'       => [
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
    'content'         => [
        'label'       => 'Content Management',
        'icon'        => 'outline.deployed_code',
        'icon_active' => 'fill.deployed_code',
        'category'        => [
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
    | Resume
    |--------------------------------------------------------------------------
    */
    'resume'          => [
        'label'       => 'Resume',
        'icon'        => 'outline.picture_as_pdf',
        'icon_active' => 'fill.picture_as_pdf',
        'company'         => [
            'label'       => 'Companies',
            'title'       => 'Companies',
            'heading'     => 'Companies',
            'subheading'  => '',
            'icon'        => 'outline.corporate_fare',
            'icon_active' => 'outline.corporate_fare',
        ],
        'experience'         => [
            'label'       => 'Experiences',
            'title'       => 'Experiences',
            'heading'     => 'Experiences',
            'subheading'  => '',
            'icon'        => 'outline.work_history',
            'icon_active' => 'fill.work_history',
        ],
        'skill'         => [
            'label'       => 'Skills',
            'title'       => 'Skills',
            'heading'     => 'Skills',
            'subheading'  => '',
            'icon'        => 'outline.trophy',
            'icon_active' => 'fill.trophy',
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
