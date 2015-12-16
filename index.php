<?php 
    require_once './includes/config.php';
    include './includes/header.php';//header
    //include 'templates/home.php';//home page template
    
    //SLIM FRAMEWORK (ROUTING)
    
    //1. Step 1: Require SLIM FRAMEWORK
    require 'vendor/autoload.php';
    
    //2. Step 2: Substaniate the SLIM APPLICATION
    $app = new \Slim\Slim();
    
    //3. Step 3: Define the SLIM APPLICATION ROUTES
    //for all template rendering
    
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
    
    //POST register route
    $app->post('/register', function () use ($app){
       if($_POST){
//           var_dump($_POST);
//           exit();
           $reg_errors = array();
           //1.Check for firstname (characters, apos, period, space and dash b/w 2 and 60
           if(preg_match('/^[A-Z \'.-]{2,45}$/i', $_POST['first_name'])){
            $first_name = trim($_POST['first_name']);
       }else{
           $reg_errors['first_name'] = 'Please enter your first name!';
       }
        //2. Check for a last name:
        if(preg_match('/^[A-Z \'.-]{2,45}$/i', $_POST['last_name'])){
            $last_name = trim($_POST['last_name']);
        }else{
            $reg_errors['last_name'] = 'Please enter your last name!';
        }
        //3. Check for email (valid email address format)
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $email  = trim($_POST['email']);
        }else{
            $reg_errors['email'] = 'Please enter a valid email!';
        }
        // 4. Check for a password and match against the confirmed password:
        if (preg_match ('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/', $_POST['password1']) ) {
                if ($_POST['password1'] == $_POST['password2']) {
                        $password2 = strip_tags($_POST['password2']);
                } else {
                        $reg_errors['password2'] = 'Your password did not match the confirmed password!';
                }
        } else {
                $reg_errors['password1'] = 'Password must be between 6 and 20 characters long, with 
               at least one lowercase letter, one uppercase letter, 
               and one number.!';
        }
        $user_name = $_POST['user_name'];
        /*  end validation    */

        if(empty($reg_errors)){ 
            //Validation OK: 
            
            require_once './classes/DbHandler.php';
            $db = new DbHandler();
            $data = $db->createUser($first_name, $last_name, $email, $user_name, $password2);
           

            if ($data['message']== 'USER_SUCCESSFULLY_CREATED') {
                echo '<div class="row">
                    <div class="box">
                        <div class="col-lg-12">'; 

                //user registered success -test activation 
                $y = $data['active'];

                //1. prepare and send email
                    include './includes/helpers.php'; 
                    $replyToEmail = 'daniel.bujold.0719@gmail.com';
                    $replyToName = 'BingeTunes';
                    $mailSubject = 'BingeTunes Registration';                       
                    $messageTEXT = "Thank you for registering at BingeTunes.\n\n
                                    To activate your account please click on this link in your browser:  "
                                    .BASE_URL."activate/".urlencode($email)."/$y";
                    $messageHTML = "<p><strong>Thank you for registering at CoffeeBuzz.</strong></p> 
                                    <p>To activate your account, please click on this link:</p>".
                                    "<a href=\"".BASE_URL . 'activate/'.urlencode($email)."/$y\">Activate Now</a>";                      
                    $fromEmail = 'daniel.bujold.0719@gmail.com';
                    $fromName = 'BingeTunes';
                    $toEmail = $email;
                    $toName = $first_name.' '.$last_name;

                    //send email
                    $result = mymail($replyToEmail, $replyToName, $mailSubject, $messageHTML, $messageTEXT, $fromEmail, $fromName, $toEmail, $toName);

                    if($result){
                        // MAIL SUCCESS: show html message
                        echo '<div class="col-lg-12">
                                <hr>
                                    <h2 class="intro-text text-center"><strong>Account Registered</strong></h2>
                                <hr>
                               </div>
                              <div class="col-lg-12">
                                <div class="alert alert-success"><strong>'.$data['message'].'</strong>
                                    <p>A confirmation email has been sent to your email address.  
                                       Please click on the link in that email in order to activate your account.</p>
                                </div>
                               </div>';

                    }else{
                        //MAIL ERROR
                        echo '<div class="col-lg-12">
                                <hr>
                                    <h2 class="intro-text text-center"><strong>Account Registered</strong></h2>
                                <hr>
                               </div>
                              <div class="col-lg-12">
                                <div class="alert alert-warning"><strong>'.$data['message'].'</strong>
                                <p>Warning:  There was a problem sending a confirmation email to the following email: '.$email.'</p>';
                           echo "<p>Please contact customer support in order to complete your account activation.</p>
                                </div>
                               </div>";
                    }

            }else{
                //error

                $reg_errors['API_error']= $data['message'];
                $app->render('register.php',array('register'=>$reg_errors)); 
            }
            
           echo '<div class="clearfix"></div>
                   </div>
                </div>'; 

        }else{
            //Validation FAIL:
           $app->render('register.php',array('register'=>$reg_errors)); 
        }
       }
    });
    
    //GET login route
    $app->get('/login', function() use ($app){
        $app->render('login.php');
    });
    
    
    
    //POST login route
    $app->post('/login', function() use ($app){
        //var_dump($_POST);    
        $_SESSION['user_id']= 1;
        $_SESSION['user_admin']=true;
    });
    
    //GET band route
    $app->get('/band', function() use ($app){
        $app->render('band.php');
    });
    
    
    // <editor-fold defaultstate="collapsed" desc="Admin routes">
    //GET ADMIN route


    $app->get('/admin', function () use ($app) {
        if (empty($_SESSION['user_admin'])) {
            //not an admin user - redirect to login screen
            $app->response->redirect('/2016_BingeTunes/login');
    } else {
            //admin user - show admin page
            $app->render('admin/admin.php');
    }
    });


    //GET Admin about route
    $app->get('/admin/about', function() use ($app) {
        if (empty($_SESSION['user_admin'])) {
            //not an admin user - redirect to login screen
            $app->response->redirect('/2016_BingeTunes/login');
        } else {
            //admin user - show admin page
            $app->render('admin/about.php');
        }

    });

    //GET Admin add band route
    $app->get('/admin/add_band', function() use ($app) {
        if (empty($_SESSION['user_admin'])) {
            //not an admin user - redirect to login screen
            $app->response->redirect('/2016_BingeTunes/login');
        } else {
            //admin user - show admin page
            $app->render('admin/add_band.php');
        }

    });

    //GET Admin modify route
    $app->get('/admin/modify_spotlight', function() use ($app) {
        if (empty($_SESSION['user_admin'])) {
            //not an admin user - redirect to login screen
            $app->response->redirect('/2016_BingeTunes/login');
        } else {
            //admin user - show admin page
            $app->render('admin/modify_spotlight.php');
        }

    }); // </editor-fold>

    
    
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