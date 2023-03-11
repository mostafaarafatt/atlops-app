<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'roles' => 'c,r,u,d,s',
            'admins' => 'c,r,u,d,s,b',
            'users' => 'c,r,u,d,s',
            'settings' => 'c,r,u,d',
            'backups' => 'c,r,d,dl',
            'categories' => 'c,r,u,d,s',
            'subcategories' => 'c,r,u,d,s',
            'services' => 'c,r,u,d,s',
            'countries' => 'c,r,u,d,s',
            'cities' => 'c,r,u,d,s',
            'sliders' => 'c,r,u,d,s',
            'blogs' => 'c,r,u,d,s',
            'orders' => 'r,u,d,s',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        's' => 'show',
        'b' => 'block',
        'dl' => 'download',
        'so' => 'sort',
        'rt' => 'readTrashed',
        're' => 'restore',
        'f' => 'forceDelete',
        'a' => 'attach',
        'st' => 'status',
    ]
];
