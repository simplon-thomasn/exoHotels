<?php

use Symfony\Component\HttpFoundation\Request;

// Home page
$app->get('/', function () use ($app) {
    $hotels = $app['dao.hotel']->findAll();
    return $app['twig']->render('index.html.twig', array('hotels' => $hotels));
})->bind('home');

// Hotel details with comments
$app->get('/hotel/{id}', function ($id) use ($app) {
    $hotel = $app['dao.hotel']->find($id);
    $comments = $app['dao.comment']->findAllByHotel($id);
    return $app['twig']->render('hotel.html.twig', array('hotel' => $hotel, 'comments' => $comments));
})->bind('hotel');

// Login form
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');
