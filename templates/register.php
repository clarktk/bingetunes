<div class="content-main-wrap">
    <div class="content-main opacity">
        <section class="content-section contact-section">
            <div class="wrap content-contact">
                <div class="container-fluid">
                    <header>
                        <h2 class="entry-header ">Register</h2>
                    </header><hr /><br />

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="event-block">
                                <?php
                                if (!empty($data['register'])) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close"
                                                data-dismiss="alert"
                                                aria-hidden="true">&times;
                                        </button>
                                        <ul>
                                            <?php
                                            $errors = $data['register'];
                                            foreach ($errors as $error):
                                                echo "<li>$error</li>";
                                            endforeach;
                                            ?>
                                        </ul> 
                                    </div>  
                                <?php } ?>
                                <form method="post" id="contact_form" class="contact-form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="author">First Name</label><input type="text" id="firstname" class="comments-line" name="first_name"
                                                                                         value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars(strip_tags($_POST['first_name'])); ?>">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="author">Last Name</label><input type="text" id="lastname" class="comments-line" name="last_name"
                                                                                        value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars(strip_tags($_POST['last_name'])); ?>">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="email">E-mail</label><input type="text" id="email" class="comments-line" name="email"
                                                                                    value="<?php if (isset($_POST['email'])) echo htmlspecialchars(strip_tags($_POST['email'])); ?>">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="username">Screen Name</label><input type="text" id="user_name" class="comments-line" name="user_name"
                                                                                            value="<?php if (isset($_POST['user_name'])) echo htmlspecialchars(strip_tags($_POST['user_name'])); ?>">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="passowrd">Password</label><input type="password" id="password1" class="comments-line" name="password1">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="passowrd">Confirm Password</label><input type="password" id="password2" class="comments-line" name="password2">
                                        </div>                                                            
                                    </div>
                                    <p class="form-submit">
                                        <input type="submit" name="submit" id="submit" value="Register" class="submit contact-button submit">
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