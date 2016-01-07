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
    //GET index route
    $app->get('/home', function() use ($app){
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
               echo'<div class="content-main-wrap">
                <div class="content-main opacity">
                    <section class="content-section contact-section">
                        <div class="wrap content-contact">
                            <div class="container-fluid">
                                <div class="row">
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
                    $messageHTML = "<p><strong>Thank you for registering at BingeTunes.</strong></p> 
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
                                <header>
                                    <h2 class="entry-header ">Account Registered</h2>
                                </header><hr /><br />
                               </div>
                              <div class="col-lg-12">
                                <div>
                                    <p>A confirmation email has been sent to your email address.  
                                       Please click on the link in that email in order to activate your account.</p>
                                </div>
                               </div>';

                    }else{
                        //MAIL ERROR
                        echo '<div class="col-lg-12">
                                <header>
                                    <h2 class="entry-header ">Account Registered</h2>
                                </header><hr /><br />
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
            
           echo '
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>'; 

        }else{
            //Validation FAIL:
           $app->render('register.php',array('register'=>$reg_errors)); 
        }
       }
    });    
   
    //PUT ACTIVATE ROUTE
    $app->put('/activate', function() use ($app){
    //check for required params
    verifyRequiredParams(array('email', 'active'));
    //create empty response array
    $response = array();
    
    //read post parameters
    $email = $app->request->post('email');
    $active= $app->request->post('active');
    
    //validate email parameter
    validateEmail($email);
    
    //validate the activation code (length should be 32 characters)
    if (strlen($active)==32){
       //create instance of dbHandler and call method 
        $db = new DbHandler();
        $res = $db->activateUser($email, $active);
        
        //check response 
        if($res['message']==='USER_ACTIVE_SUCCESS'){
            //SUCCESS
            $response['error'] = false;
            $response['message']='Your account is now active';
        }else if($res['message']==='USER_ACTIVE_FAIL'){
            //FAIL
            $response['error'] = true;
            $response['message']='Oops, An error has occured';
        }else if($res['message']==='USER_NOT_EXIST'){
            //USER DOES NOT EXIST IN DATABASE
            $response['error'] = true;
            $response['message']='Sorry, that email does not exist';
        }
        
    }else{
        $response['error'] = true;
        $response['message'] = 'Activation code is not valid!';
    }
    
    //output final response
    echo $response;
    
});   

    //GET Activate route
    $app->get('/activate/:x/:y', function($x,$y) use ($app){
//    $email = $app->request->get('x');
//    $active= $app->request->get('y');
    
            require_once './classes/DbHandler.php';
            $db = new DbHandler();
            $data = $db->activateUser($x, $y);
            
            echo "<div class=\"content-main opacity\">
                    <section class=\"content-section contact-section\">
                        <div class=\"wrap content-contact\">
                            <div class=\"container-fluid\">
                                        <header>
                                        <h2 class=\"entry-header \">Account Activation</h2>
                                        </header><hr /><br />
                                    </div>
                                        ";
            
            if($data['message']=='USER_ACTIVE_SUCCESS'){
                echo '<h3>Account Activated</h3>';
                
            }elseif($data['message']=='USER_ACTIVE_FAIL'){
                echo '<h3>Activation Error</h3>';    
            }elseif($data['message']=='USER_NOT_EXIST'){
                echo "<h3>User doesn't exist</h3>";  
            };
            echo "</div></section></div>";
});

    //GET login route
    $app->get('/login', function() use ($app){
        $app->render('login.php');
    });
    
    //POST login route
    $app->post('/login', function() use ($app){

    //create empty response array
    $response = array();
    
    //read post params
    $email_username = $app->request->post('username');
    $password =  $app->request->post('password');
    
    //instantiate the DbHandler class and call the checkloging method
    require_once './classes/DbHandler.php';
    $db = new DbHandler();
    
    //check for correct email and password combination
    if($db->checkLogin($email_username, $password)){
        //valid user - get user details
        $user = $db->getUserByEmail($email_username);
        if(!empty($user)){
//          var_dump($user);
            foreach ($user as $item):
            $userid = $item['user_id'];
            $firstName = $item['first_name'];
            $lastName = $item['last_name'];
            $username = $item['user_name'];
            $fullname = $firstName. ' ' .$lastName;
            $admin = $item['admin'];
            $expired = $item['notexpired'];
            endforeach;
        
            //store data in session
            $_SESSION['user_id']=$userid;
            $_SESSION['fullname']=$fullname;
            $_SESSION['user_admin']=$admin;
            $_SESSION['user_not_expired']=$expired;
            
            echo    '<div class="content-main-wrap">
                        <div class="content-main opacity">
                            <section class="content-section contact-section">
                            <div class="wrap content-contact">
                                <div class="container-fluid">
                                <header>
                                <h2 class="entry-header ">Welcome '.$username.'</h2>
                                </header><hr /><br />
                                </div>
                                <div class="col-lg-12">
                                    <div class="alert">
                                    <p>You have successfully signed in!  
                                    You will be automatically redirected to the home page in <span id="count">5</span> seconds...
                                    </p>
                                </div>';
                                echo "<script>
                                var delay = 5 ;
                                var url = 'home';
                                function countdown() {
                                        setTimeout(countdown, 1000) ;
                                        $('#count').html(delay);
                                        delay --;
                                        if (delay < 0 ) {
                                                window.location = url ;
                                                delay = 0 ;
                                        }
                                }
                                countdown() ;   
                                </script>"; 
                                echo '<div class="clearfix"></div>
                            </div>
                            </section>
                        </div>
                    </div>';
        }
    }else{
        //invalide user - build response
        $data ['message'] = 'Login failed, incorrect credentials!';
        $app->render('login.php',array('login'=>$data ['message']));
        
    }
    //output final response
   

});
    
//    //GET band route
//    $app->get('/band', function() use ($app){
//        $app->render('band.php');
//    });
    
    //GET band route
    $app->get('/bandsearch', function() use ($app){
        $app->render('bandsearch.php');
    });
    
    //POST band route
    $app->post('/bandsearch', function() use ($app){
            function getData($url) {
                //$url = "https://api.spotify.com/v1/search?q=$q&type=artist&market=US";
                //echo $url;
                //exit();
                //get the data from json call to api
                $curl = curl_init($url);

                // indicates that we want the response back
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                // exec curl and get the data back
                $json_data = curl_exec($curl);

                // remember to close the curl session once we are finished retrieveing the data
                curl_close($curl);
                return $json_data;
                }
        //$app->render('bandsearch.php');
        if (!empty($_POST['spotify_q'])) {
                $q = urlencode($_POST['spotify_q']); //spotify needs encoded url
                //prepare json url 
                $url = "https://api.spotify.com/v1/search?q=$q&type=artist&market=US";

                $artistData = json_decode(getData($url), true);
                //var_dump($artistData['artists']['items']);            
                if (!empty($artistData['artists']['items'])) {
                $id = $artistData['artists']['items'][0]['id'];


                $url = "https://api.spotify.com/v1/artists/$id/albums?market=US";
                $albumData = json_decode(getData($url), true);
                //var_dump($albumData['items']);

                $albums = $albumData['items'];
                $app->render('bandsearch.php',array('albums'=>$albums));
                
                }
        }
        
    });
    
     //GET band route
    $app->get('/bandresult/:id/:url', function($id,$url) use ($app){
//        echo $id;
//        echo '<br>';
//        echo str_replace('|','/',$url);
//        echo 'hello';
        

        $imageURL = str_replace('|','/',$url);
        $url = "https://api.spotify.com/v1/albums/$id/tracks?market=US";
        
        //$url = "https://api.spotify.com/v1/search?q=$q&type=artist&market=US";
        //echo $url;
        //exit();
        //get the data from json call to api
        $curl = curl_init($url);

        // indicates that we want the response back
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        // exec curl and get the data back
        $json_data = curl_exec($curl);
        $data = json_decode($json_data, true);
        // remember to close the curl session once we are finished retrieveing the data
        curl_close($curl);
        //var_dump($data);
        //$app->render('bandresult.php');
        
        //var_dump($data['items']);
        $app->render('bandresult.php',array('artist'=>$data['items'],'imageURL'=>$imageURL));
        
    });    
    
//    // <editor-fold defaultstate="collapsed" desc="Admin routes">
//    //GET ADMIN route
//
//
//    $app->get('/admin', function () use ($app) {
//        if (empty($_SESSION['user_admin'])) {
//            //not an admin user - redirect to login screen
//            $app->response->redirect('/2016_BingeTunes/login');
//    } else {
//            //admin user - show admin page
//            $app->render('admin/admin.php');
//    }
//    });
//
//
//    //GET Admin about route
//    $app->get('/admin/about', function() use ($app) {
//        if (empty($_SESSION['user_admin'])) {
//            //not an admin user - redirect to login screen
//            $app->response->redirect('/2016_BingeTunes/login');
//        } else {
//            //admin user - show admin page
//            $app->render('admin/about.php');
//        }
//
//    });
//
//    //GET Admin add band route
//    $app->get('/admin/add_band', function() use ($app) {
//        if (empty($_SESSION['user_admin'])) {
//            //not an admin user - redirect to login screen
//            $app->response->redirect('/2016_BingeTunes/login');
//        } else {
//            //admin user - show admin page
//            $app->render('admin/add_band.php');
//        }
//
//    });
//
//    //GET Admin modify route
//    $app->get('/admin/modify_spotlight', function() use ($app) {
//        if (empty($_SESSION['user_admin'])) {
//            //not an admin user - redirect to login screen
//            $app->response->redirect('/2016_BingeTunes/login');
//        } else {
//            //admin user - show admin page
//            $app->render('admin/modify_spotlight.php');
//        }
//
//    }); // </editor-fold>

      
    //GET logout route
    $app->get('/logout', function() use ($app){
        session_unset(); //unset session variable
        session_destroy(); //destroy session data in storage
        //$app->render('home.php');
        $app->response->redirect('/2016_BingeTunes/');
    });
    
    //GET contact route
    $app->get('/contact', function() use ($app){
        unset($_SESSION['mailsent']);
        $app->render('contact.php');
    });
    
    //POST contact route
    $app->post('/contact', function() use ($app){
        //var_dump($_POST);
        //exit();
        if($_POST){
        //if user has submitted form
        //first prevent resubmit
         
        if(isset($_SESSION['mailsent'])){
            //mail has already been sent
            //redirect user to home page
//            var_dump($_POST);
//            exit();
            header("location:contact");
            exit();
        }
           
        //checking for validation errors
        $email_errors = array();
        //1. Check Name
        //   characters (between 2 and 16), apos, period, space, dash
        if(preg_match('/^[A-Z \'.-]{2,60}$/i',$_POST['author'])){
            //ok
            $fullname = trim($_POST['author']);
        }else{
            //no match - prepare error
            $email_errors['author'] = 'Please enter your fullname!';
        }
        
        //2. Check Email
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //ok
            $email = trim($_POST['email']);
        }else{
            //invalid email
            $email_errors['email'] = 'Please enter a valid email!';
        }
        
        //3. Check message        
        if(preg_match('/^[A-Z0-9 ()!\',.?-]{2,500}$/i',$_POST['comment'])){
            //ok
            $message = trim($_POST['comment']);
        }else{
            //no match - prepare error
            $email_errors['comment'] = 'Please enter a valid message!';
        }
        
        //end of validation
        if(empty($email_errors)){
            //validation has passed - ok to send email
            include './includes/helpers.php';
            
            //prepare variables
            //$phone = $_POST['phone']; //could also validate this
            
            $htmlmessage = "<h3> Email from: $fullname</h3>
                            <p>$message</p>";
            $textmessage = "Email from $fullname\n
                            $message";
            
            //send the email
            $result = mymail($email,$fullname,'BingeTunes Website Inquiry', $htmlmessage,$textmessage);
            if($result){
                //mail success - show the mailsent template
                $app->render('mailsent.php');
                $_SESSION['mailsent']=true;
            }else{
                //mail failure - show the mailerror template
                $app->render('mailerror.php');                
            }
                    
        }else{
            //validation failed - resent user back to contact page
            //passing the array of errors
            $app->render('contact.php',array('contact'=>$email_errors));
        }
    }
    });
   
    
    //404 page note found
    $app->notFound(function() use ($app){
    $app->render('404.php');
});
    
    
    // <editor-fold defaultstate="collapsed" desc="============ HELPER FUNCTIONS ============">
/**
 * Required inputs for HTTP POST | GET
 * @param type $required_fields
 */
function verifyRequiredParams($required_fields) {
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;


    //Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);

    }

    foreach ($required_fields as $fields) {
        if (!isset($request_params[$fields]) ||

            strlen(trim($request_params[$fields])) <= 0) {
            //some or all inputs are not there or they are empty
            $error = true;
            $error_fields .= $fields . ', ';
        }
    }


    if ($error) {
        //Required field(s) are missing or empty
        $response = array();
        $app = \Slim\Slim::getInstance();
        $response['error'] = true;
        $response['message'] = 'Required field(s) ' .

        substr($error_fields, 0, -2) . ' is missing or empty';
        echo $response;
        $app->stop();
    }
    
    
}


/**
 * Check for valid email format
 * @param type $email
 */
function validateEmail($email) {
    $app = \Slim\Slim::getInstance(); //get handle on slim


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //FAIL - RETURN MESSAGE - STOP APP
        $response['error'] = true;
        $response['message'] = 'Your email address is not valid';
        echo $response;
        $app->stop();

    }
}

// </editor-fold>
    
    //4. Step 4: Run the SLIM APPLICATION
    $app->run();
    
    
    include 'includes/nav.php';//nav
    include 'includes/footer.php';//footer