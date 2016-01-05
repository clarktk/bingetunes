<div class="content-main-wrap">
                <div class="content-main opacity">
                    <section class="content-section contact-section">
                        <div class="wrap content-contact">
                            <div class="container-fluid">
                                <header>
                                    <h2 class="entry-header ">Login</h2>
                                </header><hr /><br />
                                <div class="row">
                                    <div class="col-lg-6">
                            <?php
            //check for validation errors
           //print_r($data['login']);
           if (!empty($data['login'])){
            ?>
            <div class="alert alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><?php echo $data['login'];?></p>
             </div>  
            <?php   }   ?> 
                                
                                                <div class="event-block">
                                                    <form action="login" method="post" id="contact_form" class="contact-form">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <label for="username">Email or Username</label><input type="text" name="username" id="username" class="comments-line" name="author">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <label for="passowrd">Password</label><input type="password" name="password" id="password" class="comments-line" name="author">
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        <p class="form-submit">
                                                            <input type="submit" name="submit" id="submit" value="Login" class="submit contact-button submit">
                                                        </p>
                                                    </form>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>