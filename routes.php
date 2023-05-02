<?php

$router->get('/', 'controllers/home/index.php')->only('auth');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php')->only('auth');
$router->get('/my-notes', 'controllers/notes/show.php')->only('auth');
$router->get('/notes/edit', 'controllers/notes/edit.php')->only('auth');
$router->patch('/notes', 'controllers/notes/update.php')->only('auth');
$router->delete('/notes', 'controllers/notes/destroy.php')->only('auth');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/login', 'controllers/session/store.php')->only('guest');
$router->delete('/logout', 'controllers/session/destroy.php')->only('auth');
