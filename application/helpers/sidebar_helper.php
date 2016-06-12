<div class="admin-sidebar-box col-md-10">
      <div class="col-xs-4">
      <img src="<?php echo base_url() ?>img/logo.png" alt="" class="img-responsive profile-pic">
<!--                          <img src="https://avatars.discourse.org/letter/b/f98200/64.png" alt="" class="img-responsive">-->
      </div>
      <div class="col-xs-8">
        <?php if($this->session->userdata('ustype_id') == 1): ?>
          <p>
            <div class="dropdown" id="notifybaloon" data-title="You have notification!">
                <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                  <i class="glyphicon glyphicon-bell"></i> <?php echo $this->session->userdata('firstname'); ?> <?php echo $this->session->userdata('lastname');  ?>
                </a>

                <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">

                  <div class="notification-heading"><h4 class="">Notifications</h4><h4 class="menu-title pull-right"></h4>
                  </div>
                  <li class="divider"></li>
                     <div class="notifications-wrapper">
                       <a class="content" href="<?php echo base_url() ?>products/view?id={{ p.pr_id }}" v-for="p in productWithLowItem">
                         {{ counterThis() }}
                         <div class="notification-item">
                          <h4 class="item-title">{{ p.pr_name }}</h4>
                          <p class="item-info">this product is <span id="itmx{{ counterx }}"></span>{{ getAvailableQuantity(p.pr_id,p.pr_quantity, 'itmx' + counterx) }} item(s) left. need to add more items</p>
                        </div>
                        {{ countNotif() }}
                      </a>
                       </div>
                  <li class="divider"></li>
                  <div class="notification-footer"><h4 class="menu-title"></h4></div>
                </ul>

              </div>
          </p>
        <?php else: ?>
          <p>
             <i class="fa fa-user"></i> <?php echo $this->session->userdata('firstname'); ?> <?php echo $this->session->userdata('lastname');  ?>
          </p>
        <?php endif; ?>
          <p><i class="fa fa-thumb-tack fa-fw"></i> <?php echo $this->session->userdata('usertype');  ?></p>
      </div>
  </div>
  <div class="admin-sidebar-box col-md-10">
   <h4>Options:</h4>
   <hr>
    <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo base_url(); ?>dashboard" class="side-menu">Dashboard<i class="fa fa-columns pull-right"></i></a></li>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>products" class="side-menu">Products<i class="fa fa-tags fa-fw pull-right"></i></a></li>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>category" class="side-menu">Category <i class="fa fa-tags fa-fw pull-right"></i></a></li>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>users" class="side-menu">Users<i class="fa fa-users fa-fw pull-right"></i></a></li>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>branch" class="side-menu">Branch<i class="fa fa-map-marker pull-right"></i></a></li>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>settings" class="side-menu">Settings<i class="fa fa-wrench fa-fw pull-right"></i></a></li>
    </ul>
</div>
