<?php
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    // $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
    //     'httpOnly' => true
    // ]));
    // $routes->applyMiddleware('csrf');

    $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index', 'index']);

    $routes->connect('home/', ['controller' => 'Pages', 'action' => 'home', 'home']);

    $routes->connect('users/*', ['controller' => 'Users', 'action' => 'index', 'index']);
    $routes->connect('users/add', ['controller' => 'Users', 'action' => 'add', ]);
    $routes->connect('users/view/*', ['controller' => 'Users', 'action' => 'view', ]);
    $routes->connect('users/edit/*', ['controller' => 'Users', 'action' => 'edit']);
    $routes->connect('users/delete/*', ['controller' => 'Users', 'action' => 'delete']);
    $routes->connect('users/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('users/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('users/register', ['controller' => 'Users', 'action' => 'register']);
    $routes->connect('users/verification', ['controller' => 'Users', 'action' => 'verification', 'verification']);
    $routes->connect('users/forgotpassword', ['controller' => 'Users', 'action' => 'forgotpassword']);
    $routes->connect('users/profile', ['controller' => 'Users', 'action' => 'profile']);
    $routes->connect('users/updateprofile/*', ['controller' => 'Users', 'action' => 'updateprofile']);



    $routes->connect('/categories/*', ['controller' => 'Categories', 'action' => 'index']); 
    $routes->connect('/categories/add', ['controller' => 'Categories', 'action' => 'add']); 
    $routes->connect('/categories/view/*', ['controller' => 'Categories', 'action' => 'view']); 
    $routes->connect('/categories/edit/*', ['controller' => 'Categories', 'action' => 'edit']); 
    $routes->connect('/categories/delete/*', ['controller' => 'Categories', 'action' => 'delete']); 


    $routes->connect('/customer', ['controller' => 'Customers', 'action' => 'index']); 
    $routes->connect('/customer/login', ['controller' => 'Customers', 'action' => 'login']); 
    $routes->connect('/customer/register', ['controller' => 'Customers', 'action' => 'register']); 
    $routes->connect('/customer/verification', ['controller' => 'Customers', 'action' => 'verification']); 
    $routes->connect('/customer/add', ['controller' => 'Customers', 'action' => 'add']); 
    $routes->connect('/customer/edit/*', ['controller' => 'Customers', 'action' => 'edit']); 
    $routes->connect('/customer/delete/*', ['controller' => 'Customers', 'action' => 'delete']); 

    $routes->connect('/products', ['controller' => 'Products', 'action' => 'index']);  
    $routes->connect('/products/add', ['controller' => 'Products', 'action' => 'add']); 
    $routes->connect('/products/edit/*', ['controller' => 'Products', 'action' => 'edit']); 
    $routes->connect('/products/delete/*', ['controller' => 'Products', 'action' => 'delete']); 

    $routes->connect('/addcart', ['controller' => 'Pages', 'action' => 'addcart']); 
    $routes->connect('/viewcart/*', ['controller' => 'Pages', 'action' => 'viewcart']); 
    $routes->connect('/updatecart/*', ['controller' => 'Pages', 'action' => 'updatecart']); 
    $routes->connect('/deletecart/*', ['controller' => 'Pages', 'action' => 'deletecart']); 
    $routes->connect('/checkout', ['controller' => 'Pages', 'action' => 'checkout']); 
    $routes->connect('/search', ['controller' => 'Pages', 'action' => 'search']); 


    $routes->connect('/confirm', ['controller' => 'Orders', 'action' => 'confirm']); 

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    // $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
