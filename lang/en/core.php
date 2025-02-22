<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Static Page
    |--------------------------------------------------------------------------
    */
    'about' => [
        'whoami' => 'I am an experienced Fullstack Web Developer specializing in web application development. With expertise in both front-end and back-end, I am committed to creating efficient digital solutions that provide a satisfying user experience. I always strive to deliver high-quality results that meet user needs.',
    ],
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
        'icon'        => 'outline.rss_feed',
        'icon_active' => 'outline.rss_feed',
        'post'       => [
            'label'       => 'Posts',
            'title'       => 'Posts',
            'heading'     => 'Posts',
            'subheading'  => '',
            'icon'        => 'outline.library_books',
            'icon_active' => 'fill.library_books',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Collections
    |--------------------------------------------------------------------------
    */
    'collection'          => [
        'label'       => 'Collections',
        'icon'        => 'outline.collections_bookmark',
        'icon_active' => 'fill.collections_bookmark',
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
        'icon'        => 'outline.monitoring',
        'icon_active' => 'outline.monitoring',
        'visitor'         => [
            'label'       => 'Visitors',
            'title'       => 'Visitors',
            'heading'     => 'Visitors',
            'subheading'  => '',
            'icon'        => 'outline.query_stats',
            'icon_active' => 'outline.query_stats',
        ],
    ],
];
