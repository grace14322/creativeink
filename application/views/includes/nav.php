<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
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
            <ul class="right-nav logout">
                    <li class="<?php echo ((current_url() != base_url()) || (current_url() == base_url('auth/postlogin')) ? '' : 'hidden') ?>"><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="glyphicon glyphicon-log-out"></i> Log out</a></li>
                    
            </ul> 
            <ul class="right-nav">
                    <li><b>Date: </b><?php echo date('m/d/Y'); ?></li>
                    <li id="txt"></li>
                    <!--<li><a href="#"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>-->
                </ul>               
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>