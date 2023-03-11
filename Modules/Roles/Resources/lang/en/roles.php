<?php

return [
    'singular' => 'Role',
    'plural' => 'Roles',
    'empty' => 'There are no roles yet.',
    'count' => 'Roles count',
    'search' => 'Search',
    'select' => 'Select Role',
    'perPage' => 'Roles Per Page',
    'filter' => 'Search for role',
    'description' => 'Show All User Roles',
    'actions' => [
        'list' => 'List all',
        'create' => 'Create Role',
        'show' => 'Show Role',
        'edit' => 'Edit Role',
        'delete' => 'Delete Role',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The role has been created successfully.',
        'updated' => 'The role has been updated successfully.',
        'deleted' => 'The role has been deleted successfully.',
    ],
    'attributes' => [
        'name' => 'Role Name',
        'empty' => 'No Data',
        'permissions' => 'Permissions',
        'model' => 'Model',
        'roles' => 'Roles',
        'info' => [
            'name' => 'note: please separate words with underscore (_)'
        ],
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the role?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],

    'models' => [
        'users' => 'Users',
        'countries' => 'Countries',
        'cities' => 'Cities',
        'categories' => 'Categories',
        'subcategories' => 'Sub Categories',
        'sliders' => 'Sliders',
        'blogs' => 'Blogs',
        'orders' => 'Orders',
        'roles' => 'Roles',
        'admins' => 'Admins',
        'settings' => 'Settings',
        'backups' => 'Backups',
        'regions' => 'Regions',
        'reasons' => 'Reasons',
        'services' => 'Services',
        'item' => 'items',
    ],
    'permission_maps' => [
        'create' => 'create',
        'read' => 'read',
        'update' => 'update',
        'delete' => 'delete',
        'show' => 'show',
        'block' => 'block',
        'download' => 'download',
        'sort' => 'sort',
        'restore' => 'restore',
        'forceDelete' => 'hard delete',
        'readTrashed' => 'read Trashed items',
        'attach' => 'attach',
        'status' => 'Change Status',
    ]
];
