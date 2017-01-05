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
