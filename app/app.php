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


// Register services.
$app['dao.hotel'] = $app->share(function ($app) {
    return new exoHotels\DAO\HotelDAO($app['db']);
});
$app['dao.comment'] = $app->share(function ($app) {
    $commentDAO = new exoHotels\DAO\CommentDAO($app['db']);
    $commentDAO->setHotelDAO($app['dao.hotel']);
    return $commentDAO;
});
