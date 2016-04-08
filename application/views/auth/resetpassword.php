<section class="login Aligner">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php echo form_open('auth/resetpassword'); ?>
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <input type="hidden" name="slug" value="<?php echo $_GET['t'] ?>">
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
                       <?php endif; unset($_SESSION['error-message']);?>
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
                                <i>Enter your new password!</i>
                             </p>
                            <div class="form-group group-field">
                                <label for="npassword"><i class="fa fa-lock"></i></label> <input type="password" value="" placeholder="Enter your new password" name="npass" class="form-control input-login">
                            </div>
                            <div class="line"></div>
                            <div class="form-group group-field">
                                <label for="vpassword"><i class="fa fa-lock"></i></label> <input type="password" value="" placeholder="Confirm password" name="vpass" class="form-control input-login">
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
