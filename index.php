<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

//run $f3

$f3->route('GET / ', function(){
    //echo '<h1>It is raining today</h1>';
    $view = new Template();
    echo $view->render('views/home.html');
});

//breakfast route
$f3->route('GET /breakfast ', function(){
    $view = new Template();
    echo $view->render('views/bfast.html');
});

$f3->route('GET /breakfast/green-eggs ', function(){
    $view = new Template();
    echo $view->render('views/greenEggsAndHam.html');
});

$f3-> run();