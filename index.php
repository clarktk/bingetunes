<?php 
    session_start();

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
        $app->render('home.php');
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
    
    
    
    //POST contact route
    $app->post('/login', function() use ($app){
        //var_dump($_POST);    
        $_SESSION['user_id']= 1;
    });
    
    //GET band route
    $app->get('/band', function() use ($app){
        $app->render('band.php');
    });
    
    //GET favorites route
    $app->get('/favorites', function() use ($app){
        if(!empty($_SESSION['user_id'])){
            $app->render('favorites.php');
            
        }else{
            $app->render('login.php');
        }
        
    });
    
    //GET ADMIN route
    
    $app->get('/admin', function () use ($app){
        if(empty($_SESSION['user_admin'])){
            //not an admin user - redirect to login screen
            $app->response->redirect('/2016_BingeTunes/login');
    }else{
            //admin user - show admin page
            $app->render('admin/admin.php');
    }
    });
    
    //GET Admin about route
    $app->get('/admin/about', function() use ($app){
        if(empty($_SESSION['user_admin'])){
            //not an admin user - redirect to login screen
            $app->response->redirect('/2016_BingeTunes/login');
        }else{
            //admin user - show admin page
            $app->render('admin/about.php');
        }    
    });

    //GET Admin add band route
    $app->get('/admin/add_band', function() use ($app){
        if(empty($_SESSION['user_admin'])){
            //not an admin user - redirect to login screen
            $app->response->redirect('/2016_BingeTunes/login');
        }else{
            //admin user - show admin page
            $app->render('admin/add_band.php');
        }    
    });

    //GET Admin modify route
    $app->get('/admin/modify_spotlight', function() use ($app){
        if(empty($_SESSION['user_admin'])){
            //not an admin user - redirect to login screen
            $app->response->redirect('/2016_BingeTunes/login');
        }else{
            //admin user - show admin page
            $app->render('admin/modify_spotlight.php');
        }    
    });
    
    
    //GET logout route
    $app->get('/logout', function() use ($app){
        session_unset(); //unset session variable
        session_destroy(); //destroy session data in storage
        //$app->render('home.php');
        $app->response->redirect('/2016_BingeTunes/');
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