<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

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

$f3->route('GET|POST /order ', function($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        var_dump($_POST);
        $meals = array("breakfast", "lunch", "dinner");

        if(empty($_POST['food']) || !in_array($_POST['meal'], $meals)){
            echo "<p>Please enter a food</p>";
        } else{
            $_SESSION['food'] = $_POST['food'];
            $_SESSION['meal'] = $_POST['meal'];
            $f3->reroute('summary');
            session_destroy();
        }
    }

    $view = new Template();
    echo $view->render('views/order.html');

});

$f3->route('GET /summary ', function(){
    $view = new Template();
    echo $view->render('views/summary.html');
});

$f3-> run();