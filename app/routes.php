<?php

// Home page
$app->get('/', function () use ($app) {
    $hotels = $app['dao.hotel']->findAll();
    return $app['twig']->render('index.html.twig', array('hotels' => $hotels));
});

// Hotel details with comments
$app->get('/hotel/{id}', function ($id) use ($app) {
    $hotel = $app['dao.hotel']->find($id);
    $comments = $app['dao.comment']->findAllByHotel($id);
    return $app['twig']->render('hotel.html.twig', array('hotel' => $hotel, 'comments' => $comments));
})->bind('hotel');
