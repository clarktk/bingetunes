<?php 
    include 'includes/header.php';//header
    //include 'templates/home.php';//home page template
    
    //SLIM FRAMEWORK (ROUTING)
    
    //1. Step 1: Require SLIM FRAMEWORK
    require 'vendor/autoload.php';
    
    //2. Step 2: Substaniate the SLIM APPLICATION
    $app = new \Slim\Slim();
    
    //3. Step 3: Define the SLIM APPLICATION ROUTES
    //for all template rendering
    //
    //GET index route
    $app->get('/', function() use ($app){
        $app->render('home2.php');
    });
    
    //GET about route
    $app->get('/about', function() use ($app){
        $app->render('about.php');
    });
    
    //GET register route
    $app->get('/register', function() use ($app){
        $app->render('register.php');
    });
    
    //GET login route
    $app->get('/login', function() use ($app){
        $app->render('login.php');
    });
    
    //GET band route
    $app->get('/band', function() use ($app){
        $app->render('band.php');
    });
    
    //GET favorites route
    $app->get('/favorites', function() use ($app){
        $app->render('favorites.php');
    });
    
    //GET contact route
    $app->get('/contact', function() use ($app){
        $app->render('contact.php');
    });
    
    //POST contact route
//    $app->post('/contact', function() use ($app){
//        var_dump($_POST);
//    });
    
//    Alternate GET index route
//    $app->get('/index', function() use ($app){
//        $app->render('home.php');
//    });
    
//    test
//    $app->get('/test', function() use ($app){
//        echo '<p>this is a test</p>';
//   });
    
    
    //4. Step 4: Run the SLIM APPLICATION
    $app->run();
    
    
    include 'includes/nav.php';//nav
    include 'includes/footer.php';//footer