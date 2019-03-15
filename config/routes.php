<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    
    $routes->connect('/', ['controller' => 'Customers', 'action' => 'index']);
    
    $routes->connect('/search/', ['controller' => 'Customers', 'action' => 'search']);    
    $routes->connect('/hae/*', ['controller' => 'Customers', 'action' => 'hae']);    
    $routes->connect('/view/', ['controller' => 'Customers', 'action' => 'viewAll']);  //for testing only
    $routes->connect('/viewone/', ['controller' => 'Customers', 'action' => 'viewone']);  //for testing only
    $routes->connect('/view/*', ['controller' => 'Customers', 'action' => 'view']);
    $routes->connect('/add/', ['controller' => 'Customers', 'action' => 'add']);
    $routes->connect('/edit/', ['controller' => 'Customers', 'action' => 'edit']);
    //vaihtoehtoinen/parempi riville 38:
    $routes->connect(
        '/view/:id',
        ['controller' => 'Customers', 'action' => 'view']
        )
        ->setPatterns(['id' => '\d+'])
        ->setPass(['id']);
    $routes->connect('/teefilu/*', ['controller' => 'Customers', 'action' => 'teefilu']);
    $routes->connect('/select2haku/', ['controller' => 'Customers', 'action' => 'select2haku']);

    

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

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	//CakePlugin::routes();
/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	//require CAKE . 'Config' . DS . 'routes.php';
