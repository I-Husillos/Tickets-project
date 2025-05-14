<?php

return [
    'home' => '/',
    'user' => 'user',
    'login' => 'login',
    'register' => 'register',
    'logout' => 'logout',
    'user.tickets' => [
        'index' => 'tickets',
        'create' => 'create',
        'show' => 'show/{ticket}',
        'comment' => 'add-comment',
        'validate' => 'validate',
    ],
    'notifications' => 'notifications',
    'notifications.read' => 'notifications/{id}/mark-as-read',

    'admin' => 'admin',
    'dashboard' => 'dashboard',
    'assigned' => 'assigned',
    
    'tickets' => [
        'index' => 'tickets',
        'view' => 'view/{ticket}',
        'update_status' => 'update-status',
        'close' => 'close',
        'reopen' => 'reopen',
        'assign' => 'assign',
    ],

    'comments' => [
        'index' => 'comments',
        'comment' => 'comment',
        'delete' => 'delete',
        'view' => 'view',
    ],

    'users' => [
        'index' => 'users',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'confirm_delete' => 'confirm-deletion',
        'destroy' => 'delete',
    ],

    'admins' => [
        'list' => 'list',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'confirm_delete' => 'confirm-deletion',
        'destroy' => 'delete',
    ],

    'types' => [
        'index' => 'types',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'confirm_delete' => 'confirm-deletion',
        'destroy' => 'delete',
    ],

    'notifications' => [
        'index' => 'notifications',
        'read' => 'mark-as-read',
    ],

    'history' => [
        'events' => 'history/events',
    ],

//     'user' => 'user',
//     'login' => 'login',
//     'register' => 'register',
//     'logout' => 'logout',
//     'tickets' => 'tickets',
//     'create_ticket' => 'create-ticket',
//     'show_ticket'  => 'show-ticket',
//     'add_comment' => 'add-comment',
//     'validate_ticket' => 'validate-ticket',
//     'notifications'  => 'notifications',
//     'read_notification' => 'mark-as-read',
//     'index' => 'index',
//     'change_language'  => 'change-language',
//     'admin' => 'admin',
//     'dashboard' => 'dashboard',
//     'update_status' => 'update-status',
//     'update' => 'update',
//     'list' => 'list',
//     'close' => 'close',
//     'reopen' => 'reopen',
//     'assign' => 'assign',
//     'assigned' => 'assigned',
//     'users' => 'list-of-users',
//     'admins'  => 'list-of-admins',
//     'create' => 'create',
//     'edit' => 'edit',
//     'confirm_delete' => 'confirm-delete',
//     'destroy' => 'destroy',
//     'types' => 'types',
//     'comment' => 'comment',
//     'comments' => 'comments',
//     'read' => 'read',
];


// return [
//     "admin" => [
//       "dashboard" => [
//         "users"=>[
//           "index"
//           "edit"=>"{userid}/",
//           "delete"=>"{userid}",
//         ]
//       ],
//     ],
//   ];
  
  