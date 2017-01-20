<?php

$container['AppController'] = function ($container) {
    return new App\Controller\AppController($container);
};

$container['AuthController'] = function ($container) {
    return new App\Controller\AuthController($container);
};

$container['AccountController'] = function ($container) {
    return new App\Controller\AccountController($container);
};
