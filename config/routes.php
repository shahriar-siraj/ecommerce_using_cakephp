<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::extensions(['json', 'xml', 'csv']);
Router::defaultRouteClass('InflectedRoute');

//Public routes.
Router::scope('/', function ($routes) {

    $routes->connect(
        '/',
        [
            'controller' => 'pages',
            'action' => 'home'
        ]
    );

     $routes->connect(
        '/shop',
        [
            'controller' => 'shop',
            'action' => 'index'
        ]
    );

    // Register
        $routes->connect(
        '/users/resetPassword/:code.:id',
        [
            'controller' => 'users',
            'action' => 'resetPassword'
        ],
        [
            '_name' => 'users-resetpassword',
            'pass' => [
                'id',
                'code'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/users/register/:type',
        [
            'controller' => 'users',
            'action' => 'register'
        ],
        [
            '_name' => 'users-register',
            'pass' => [
                'type'
            ]
        ]
    );

    // Product Routes
    $routes->connect(
        '/products/:slug.:id',
        [
            'controller' => 'products',
            'action' => 'view'
        ],
        [
            '_name' => 'products-view',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Blog Routes.
    $routes->connect(
        '/media',
        [
            'controller' => 'blog',
            'action' => 'index'
        ]
    );
    $routes->connect(
        '/media/article/:slug.:id',
        [
            'controller' => 'blog',
            'action' => 'article'
        ],
        [
            '_name' => 'blog-article',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Products Routes.
    $routes->connect(
        '/products',
        [
            'controller' => 'products',
            'action' => 'index'
        ]
    );
    $routes->connect(
        '/products/:slug.:id',
        [
            'controller' => 'products',
            'action' => 'view'
        ],
        [
            '_name' => 'project-view',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/about',
        [
            'controller' => 'pages',
            'action' => 'about'
        ]
    );

    $routes->connect(
        '/privacy_policy',
        [
            'controller' => 'pages',
            'action' => 'privacy_policy'
        ]
    );

    $routes->connect(
        '/users/resetPassword/:code.:id',
        [
            'controller' => 'users',
            'action' => 'resetPassword'
        ],
        [
            '_name' => 'users-resetpassword',
            'pass' => [
                'id',
                'code'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->fallbacks();
});


//Admin routes.
Router::prefix('admin', function ($routes) {
    $routes->connect(
        '/',
        [
            'controller' => 'admin',
            'action' => 'home'
        ]
    );

    //Blog Routes.
    $routes->connect(
        '/blog/article/:slug.:id',
        [
            'controller' => 'blog',
            'action' => 'article'
        ],
        [
            '_name' => 'blog-article',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Users Routes.
    $routes->connect(
        '/users/settings',
        [
            'controller' => 'users',
            'action' => 'settings'
        ]
    );

    $routes->connect(
        '/users/delete/:slug.:id',
        [
            'controller' => 'users',
            'action' => 'delete'
        ],
        [
            '_name' => 'users-delete',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/users/deleteAvatar/:slug.:id',
        [
            'controller' => 'users',
            'action' => 'deleteAvatar'
        ],
        [
            '_name' => 'users-deleteAvatar',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Articles Routes.
    $routes->connect(
        '/articles/edit/:slug',
        [
            'controller' => 'articles',
            'action' => 'edit',
        ],
        [
            '_name' => 'articles-edit',
            'pass' => [
                'slug'
            ]
        ]
    );

    $routes->connect(
        '/articles/delete/:slug',
        [
            'controller' => 'articles',
            'action' => 'delete',
        ],
        [
            '_name' => 'articles-delete',
            'pass' => [
                'slug'
            ]
        ]
    );

    //Products Routes.
    $routes->connect(
        '/products/edit/:id',
        [
            'controller' => 'products',
            'action' => 'edit',
        ],
        [
            '_name' => 'products-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/products/delete/:id',
        [
            'controller' => 'products',
            'action' => 'delete',
        ],
        [
            '_name' => 'products-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    //Users Routes.
    $routes->connect(
        '/users/edit/:id',
        [
            'controller' => 'users',
            'action' => 'edit',
        ],
        [
            '_name' => 'users-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/users/delete/:id',
        [
            'controller' => 'users',
            'action' => 'delete',
        ],
        [
            '_name' => 'users-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    //Shops Routes.
    $routes->connect(
        '/shops/edit/:id',
        [
            'controller' => 'shops',
            'action' => 'edit',
        ],
        [
            '_name' => 'shops-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/shops/delete/:id',
        [
            'controller' => 'shops',
            'action' => 'delete',
        ],
        [
            '_name' => 'shops-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    //Orders Routes.
    $routes->connect(
        '/orders/edit/:id',
        [
            'controller' => 'orders',
            'action' => 'edit',
        ],
        [
            '_name' => 'orders-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/orders/delete/:id',
        [
            'controller' => 'orders',
            'action' => 'delete',
        ],
        [
            '_name' => 'orders-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    //Packages Routes.
    $routes->connect(
        '/packages/edit/:id',
        [
            'controller' => 'packages',
            'action' => 'edit',
        ],
        [
            '_name' => 'packages-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/packages/delete/:id',
        [
            'controller' => 'packages',
            'action' => 'delete',
        ],
        [
            '_name' => 'packages-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    //Transactions Routes.
    $routes->connect(
        '/transactions/edit/:id',
        [
            'controller' => 'transactions',
            'action' => 'edit',
        ],
        [
            '_name' => 'transactions-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/transactions/delete/:id',
        [
            'controller' => 'transactions',
            'action' => 'delete',
        ],
        [
            '_name' => 'transactions-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    //Categories Routes.
    $routes->connect(
        '/categories/edit/:slug',
        [
            'controller' => 'categories',
            'action' => 'edit',
        ],
        [
            '_name' => 'categories-edit',
            'pass' => [
                'slug'
            ]
        ]
    );

    $routes->connect(
        '/categories/delete/:slug',
        [
            'controller' => 'categories',
            'action' => 'delete',
        ],
        [
            '_name' => 'categories-delete',
            'pass' => [
                'slug'
            ]
        ]
    );

    //Attachments Routes.
    $routes->connect(
        '/attachments/edit/:id',
        [
            'controller' => 'attachments',
            'action' => 'edit',
        ],
        [
            '_name' => 'attachments-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/attachments/delete/:id',
        [
            'controller' => 'attachments',
            'action' => 'delete',
        ],
        [
            '_name' => 'attachments-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    //Groups Routes.
    $routes->connect(
        '/groups/edit/:id',
        [
            'controller' => 'groups',
            'action' => 'edit',
        ],
        [
            '_name' => 'groups-edit',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->connect(
        '/groups/delete/:id',
        [
            'controller' => 'groups',
            'action' => 'delete',
        ],
        [
            '_name' => 'groups-delete',
            'pass' => [
                'id'
            ]
        ]
    );

    $routes->fallbacks();
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
    Plugin::routes();