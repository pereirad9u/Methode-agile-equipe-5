<?php

$app->get('/', 'AppController:home')->setName('home');

$app->get('/franceConnect',function (){
    echo '<pre>';
   var_dump($_GET);
    echo '</pre>';
     echo '<pre>';
   var_dump($_SESSION);
    echo '</pre>';
});



$app->get('/account',"AccountController:home")->setName('user.account');
$app->get('/updateRole',"AccountController:updateRole")->setName('user.updateRole');
$app->post('/updateRole',"AccountController:updateRole");
$app->post('/updateProfile',"AccountController:updateProfile")->setName('user.updateProfile');
$app->post('/updateDocument',"AccountController:addDocument")->setName('user.addDocument');
$app->get('/createDocument',"OffreAppelController:create")->setName('appeloffre.create');
$app->post('/createDocument',"OffreAppelController:create");
$app->get('/appeloffre/{ao_id:[0-9]+}',"OffreAppelController:show")->setName('appeloffre.show');
