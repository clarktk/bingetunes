<?php
            /* Autoloading Classes
             * Whenever your code tries to create a new instance of a class
             * that PHP doesn't know about, PHP automatically calls your 
             * __autoload() function, passing in the name of the class it's
             * looking for. Your function's job is to locate and include the 
             * class file, thereby loading the class. 
             */
             function __autoload($class){
                require_once 'classes/'.$class . '.php' ;
                
             }
             //instantiate the database handler
             //$dbh = new DbHandler();
//             print_r($dbh);
//             exit();
            
        
        ?>
<div class="content content-wrap container-fluid nopadding">

                <div class="header  opacity"  id="fixed_header">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4">
                               <!--   Logo -->
                                <div class="logo">
                                    <h1><a href="index.php"><img src="images/binge-tunes-logo.png" alt="Binge Tunes - Satisfy your craving!" /></a></h1>
                                    <h2 class="slogan logo-slogan">Satisy your craving!</h2>
                                </div>
                            <!-- ^ Logo -->
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8">
                                <div class="top-sidebar sidebar">

                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-lg-4 ">
                                                                <h2 class="header-entry">
                                                                    <a href="albums.html" class="red">Latest <strong>Bands</strong></a>
                                                                </h2>
                                                            </div>
                                                            <div class="col-lg-8">

                                                                        <div class="font-posts-container" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item=">div" data-tesla-rotate="false" data-tesla-autoplay="false" data-tesla-hide-effect="false">
                                                                                
                                                                                <div class="site-title">
                                                                                    <span class="next"></span>
                                                                                    <span class="prev"></span>
                                                                                </div>
                                                                                
                                                                                <div class="carousel-wrap">
                                                                                    <div class="row tesla-carousel-items nopadding">
                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><img src="images/gallery/cover1.jpg" alt="cover" /></div>
                                                                                        </div>

                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover2.jpg" alt="cover" /></a></div>
                                                                                        </div>

                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover3.jpg" alt="cover" /></a></div>
                                                                                        </div>

                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover4.jpg" alt="cover" /></a></div>
                                                                                        </div>
                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover5.jpg" alt="cover" /></a></div>
                                                                                        </div>
                                                                                                <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover6.jpg" alt="cover" /></a></div>
                                                                                        </div>

                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover7.jpg" alt="cover" /></a></div>
                                                                                        </div>

                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover8.jpg" alt="cover" /></a></div>
                                                                                        </div>

                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover9.jpg" alt="cover" /></a></div>
                                                                                        </div>
                                                                                        <div class="col-lg-2 col-md-2 col-sm-2 nopadding">
                                                                                            <div class="play"><a href="album-single.html"><img src="images/gallery/cover10.jpg" alt="cover" /></a></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            
                                                                        </div>
                                                                      
                                                            </div>
                                                        </div>    
                                                            <!--div id="jplayer_inspector"></div -->
                                                        

                                                    </div>
                                                    <div class="col-md-4">
                                                        <!--   search -->
                                                        <div class="wrap search-wrap ">
                                                            <form method="get" role="search" action="" class="sidebar-search ">
                                                                <div class="submit-wrap">
                                                                    <input type="submit" value="" class="search-button submit" />
                                                                </div>
                                                                <div class="search">
                                                                    <input type="text" class="search-line opacity" name="s" placeholder="Search..." />
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- ^ search -->
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!--   Menu -->
                    <div class="wrap nav-main isDown opacity" id="navigation">
                            <div class="nav-overlay" id="nav_overlay" style="display:none">
                                <div class="nav-button transition">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <nav>
                                <ul>
                                    <?php
                            //Convert above static menu to dynamic using an array 
                            //of labels and pages 
                            //to allow us to dynamically set the active menu item based on 
                            //the current page user is on 
//                           $pages = array(
//                              'Home'=> '/2016_BingeTunes/index.php',
//                              'About Us'=>'/2016_BingeTunes/about.php',
//                              'Register'=>'/2016_BingeTunes/register.php',
//                              'Login'=>'/2016_BingeTunes/login.php',
//                              'Band Spotlight'=> '/2016_BingeTunes/band.php',
//                              'Favourites'=>'/2016_BingeTunes/favourites.php',
//                              'Contact'=> '/2016_BingeTunes/contact.php',
//
//                            );
                                
                            $home = array(
                              'page' => 'Home',
                              'url' => '/2016_BingeTunes/',
                              'icon' => 'home'
                            );
                            $about = array(
                              'page' => 'About',
                              'url' => '/2016_BingeTunes/about',
                              'icon' => 'question-sign'
                            );
                            $register = array(
                              'page' => 'Register',
                              'url' => '/2016_BingeTunes/register',
                              'icon' => 'register'
                            );
                            $login = array(
                              'page' => 'Login',
                              'url' => '/2016_BingeTunes/login',
                              'icon' => 'login'
                            );
                            $band = array(
                              'page' => 'Band Spotlight',
                              'url' => '/2016_BingeTunes/band',
                              'icon' => 'band'
                            );
                            $favorites = array(
                              'page' => 'favorites',
                              'url' => '/2016_BingeTunes/favorites',
                              'icon' => 'favorites'
                            );
                            $contact = array(
                              'page' => 'Contact',
                              'url' => '/2016_BingeTunes/contact',
                              'icon' => 'phone'
                            );
                            $logout = array(
                              'page' => 'Logout',
                              'url' => '/2016_BingeTunes/logout',
                              'icon' => 'phone'
                            );
                            if(!empty($_SESSION['user_id'])){
                                $pages = array(
                                  'Home' => $home,
                                  'About' => $about,
                                  'Band Spotlight' => $band,
                                  'Favorites' => $favorites,
                                  'Contact' => $contact,
                                  'Logout'=> $logout
                                );
                            }else{
                                $pages = array(
                                  'Home' => $home,
                                  'About' => $about,
                                  'Register' => $register,
                                  'Login' => $login,
                                  'Favorites' => $favorites,
                                  'Contact' => $contact
                                );
                            }
//                            //Find out which page user is viewing
//                            $this_page = $_SERVER['REQUEST_URI'];
//                            //echo $this_page;
//                            // exit();
//                            //loop the array and check if array page matches this_page
//                            foreach($pages as $k=>$v){
//                                echo '<li';
//                                if($this_page ==$v) echo ' class="active"';
//                                echo '><a href="'.$v .'">'.$k.'</a></li>';                                
//                            }
                            
                            $this_page = $_SERVER['REQUEST_URI'];
                            
                            //loop the multi-dimentional array and check if array page matches this_page
                            foreach($pages as $page=>$list):
                                $url = $list['url'];
                                echo "<li><a href=\"$url\" ";
                                if($this_page==$url)echo "class=\"active\"";
                                echo ">$page</a></li>";
                            endforeach;
                        ?>
<!--                                    <li><a href="index.php" class="active">Home</a></li>-->
                                </ul>
                                
                            </nav>

                            <div class="wrap nav-footer">
                                <footer>
                                    <!--   social -->
                                    <div class="social">
                                        <ul class="social-list">
                                            <li class="twitter">
                                                <a href=""></a>
                                            </li>
                                            <li class="facebook">
                                                <a href=""></a>
                                            </li>
                                            <li class="gplus">
                                                <a href=""></a>
                                            </li>
                                            <li class="youtube">
                                                <a href=""></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href=""></a>
                                            </li>
                                            <li class="soundcloud">
                                                <a href=""></a>
                                            </li>
                                            <li class="socnet">
                                                <a href=""></a>
                                            </li>
                                            <li class="rss">
                                                <a href=""></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- ^ social -->
                                    <div class="copy copyright">
                                        <p>&copy; Copyright 2015 Binge Tunes.</p>
                                        
                                    </div>
                                </footer>
                            </div>
                        
                    </div>
                <!-- ^ Menu -->


       
        </div>