<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;


// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();


// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/', //On sécurise l'intégralité de l'appli
            'anonymous' => true,
            'logout' => true,
            'form' => array(
              'login_path' => '/login',
              'check_path' => '/login_check'
            ),
            'users' => $app->share(function () use ($app) {
                return new exoHotels\DAO\UserDAO($app['db']);
            }),
        ),
    ),
));


// Register services.
$app['dao.hotel'] = $app->share(function ($app) {
    return new exoHotels\DAO\HotelDAO($app['db']);
});
$app['dao.user'] = $app->share(function ($app) {
    return new exoHotels\DAO\UserDAO($app['db']);
});
$app['dao.comment'] = $app->share(function ($app) {
    $commentDAO = new exoHotels\DAO\CommentDAO($app['db']);
    $commentDAO->setHotelDAO($app['dao.hotel']);
    return $commentDAO;
});
