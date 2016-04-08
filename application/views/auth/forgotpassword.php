<section class="login Aligner">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php echo form_open('auth/emailReset'); ?>
                       <div class="img-logo-holder">
                           <img src="<?php echo base_url(); ?>img/logo.png" alt="" class="img-responsive img-logo">
                       </div>
                      <?php if(isset($_SESSION['validation-errors'])): ?>
                           <div class="alert alert-danger alert-dismissible fade in" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Whoops!</strong> There were some problems with your input.
                               <?php echo $_SESSION['validation-errors']; ?>
                            </div>
                       <?php endif; unset($_SESSION['validation-errors']); ?>
                       <?php if( isset($_SESSION['error-message']) ): ?>
                           <div class="alert alert-danger alert-dismissible fade in" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Whoops!</strong> There were some problems with your input.
                               <p><?php echo $_SESSION['error-message'] ?></p>
                            </div>
                       <?php endif; ?>
                       <?php if( isset($_SESSION['success-message']) ): ?>
                           <div class="alert alert-success alert-dismissible fade in" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Success</strong>
                               <p><?php echo $_SESSION['success-message'] ?></p>
                            </div>
                       <?php endif; ?>
                       <?php unset($_SESSION['success-message']) ?>
                       <h2 class="text-center">Welcome to Creative Ink</h2>
                       <p class="text-center login-welcome">Printing & Manufacturing Company </p>
                        <div class="login-holder">
                             <p class="text-sm text-center text-muted" style="padding:15px;">
                                <i>When you fill in your registered email address, you will be sent instructions on how to reset your password.</i>
                             </p>
                            <div class="form-group group-field">
                                <label for="email"><i class="fa fa-envelope"></i></label> <input type="text" value="" placeholder="Enter your E-mail" name="email" class="form-control input-login">
                            </div>
                        </div>
                        <button class="bg-default btn-login">Submit</button>
                        <p class="text-center">
                            <span>Already have an Account?</span> <a href="<?php echo base_url(); ?>">login here</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>
