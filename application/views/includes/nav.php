<nav class="navbar navbar-custom" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="left-nav">
                    <li class="brand-logo">
                        <img src="<?php echo base_url() ?>img/logo.png" alt="" class="img-responsive" />
                    </li>
                    <li>
                       Creative Ink Printing & Manufacturing Company
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-m navbar-right">
                 <li class="t"><b>Date: </b><?php echo date('m/d/Y'); ?></li>
                 <li class="t" id="txt"></li>
                      <?php $hidden = ''; ?>
                      <?php if(current_url() == base_url() || current_url() == base_url('auth/postlogin') || current_url() == base_url('auth/forgotpassword') || current_url() == base_url('auth/reset')): ?>
                          <?php $hidden = 'hidden'; ?>
                      <?php endif; ?>
                 <!-- <li class="<?php echo $hidden ?>" class="logout"><a style="margin-top: 5px;" href="#" data-toggle="modal" data-target="#logoutModal"><i class="glyphicon glyphicon-off"></i> Log out</a></li> -->
                 <li class="<?php echo $hidden ?>" class="logout"><button style="margin-top: 8px; color:#fff; text-decoration:none;" class="btn btn-link" data-toggle="modal" data-target="#logoutModal"><i class="glyphicon glyphicon-off"></i> Log out</button></li>
            </ul>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
