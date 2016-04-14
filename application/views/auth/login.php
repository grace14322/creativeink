<section class="login">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php echo form_open('auth/postlogin'); ?>
                       <div class="img-logo-holder">
                           <img src="<?php echo base_url(); ?>img/logo.png" alt="" class="img-responsive img-logo">
                       </div>
                       <?php if( isset($_SESSION['success-message']) ): ?>
                           <div class="alert alert-success alert-dismissible fade in" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Success</strong>
                               <p><?php echo $_SESSION['success-message'] ?></p>
                            </div> 
                       <?php endif; unset($_SESSION['success-message']);?>
                       <?php if( isset($_SESSION['error-message']) ): ?>
                           <div class="alert alert-danger alert-dismissible fade in" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Whoops!</strong> There were some problems with your input.
                               <p><?php echo $_SESSION['error-message'] ?></p>
                            </div>
                       <?php endif; ?>
                       <?php unset($_SESSION['error-message']) ?>
                       <h2 class="text-center">Welcome to Creative Ink</h2>
                       <p class="text-center login-welcome">Printing & Manufacturing Company </p>
                        <div class="login-holder">
                            <div class="form-group group-field">
                                <label for="username"><i class="fa fa-user fa-fw text-muted"></i></label> <input type="text" value="" placeholder="Username or E-mail" name="username" class="form-control input-login">
                            </div>
                            <div class="line"></div>
                            <div class="form-group group-field">
                                <label for="password"><i class="fa fa-lock fa-fw text-muted"></i></label> <input type="password" value="" placeholder="Password" name="password" class="form-control input-login">
                            </div>
                        </div>
                        <button class="bg-default btn-login">Log in to Creative Ink</button>
                        <p class="text-center">
                            <a href="<?php echo base_url() ?>auth/forgotpassword">Forgot password?</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>
