<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->middleware('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');


$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

$router->get('/register', 'registration/create.php')->middleware('guest');
$router->post('/register', 'registration/store.php')->middleware('guest');

$router->get('/login', 'sessions/create.php')->middleware('guest');
$router->post('/login', 'sessions/store.php')->middleware('guest');
$router->delete('/logout', 'sessions/destroy.php')->middleware('auth');
