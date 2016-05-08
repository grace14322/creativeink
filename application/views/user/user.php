     <div class="main-container container">
        <div class="dashboard-header row shadow">
            <div class="admin-sidebar col-md-4">
               <div class="row">
                   <?php $this->load->helper('sidebar_helper') ?>
               </div>
            </div>
            <div class="col-md-8">
                <?php $this->load->helper('alerts_helper') ?>
                <h2>Users</h2>
                <hr>
                <button class="btn btn-primary" data-toggle="modal" data-target="#userModal">Add New user <i class="fa fa-plus"></i></button>     
               <?php if($this->session->userdata('is_admin')): ?>
                   <div class="pull-right">
                    <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Select Branch
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                    <?php foreach($branches as $branch): ?>
                      <li><a href="<?php echo base_url('users/branch') ?>?br_id=<?php echo $branch->br_id ?>"><?php echo $branch->br_name ?></a>
                      </li>
                    <?php endforeach; ?>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('users') ?>">View All</a>
                    </li>
                            </ul>
                       </div>
                    </div> 
                    <?php endif; ?>     
                    <div class="col-lg-12">
                        <div class="main-box no-header clearfix">
                            <div class="main-box-body clearfix">
                                <div class="table-responsive">
                                    <table id="photo-list" class="table user-list">
                                        <thead>
                                            <tr>
                                            <th><span>User</span><span></span></th>
                                            <th><span>Created</span></th>
                                            <th><span>Email</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if($users == 0): ?>
                                              <tr>
                                                  <td class="text-center" colspan ="4"><i>No User Yet</i></td>
                                              </tr>
                                          <?php else: ?>
                                              <?php foreach($users as $user): ?>

                                                   <?php if($user->user_id != $this->session->userdata('user_id')): ?>
                                                   <tr>
                                                    <td>
                                                        <img src="<?php echo base_url() ?>img/logo.png" alt="">
                                                        <a href="<?php echo base_url() ?>users/viewuser?id=<?php echo $user->user_id ?>" class="user-link"><?php echo $user->firstname.' '.$user->lastname ?></a>
                                                        <span class="user-subhead"><?php echo $user->ustype_name ?></span>
                                                    </td>
                                                    <td><?php echo $user->created_at ?></td>
                                                    <td>
                                                        <a href="#"><?php echo $user->email ?></a>
                                                        <a href="#" data-toggle="modal" data-target="#deactivateModal" class="table-link danger">
                                                            <span class="fa-stack pull-right">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                        </a>
                                                        <a href="<?php echo base_url() ?>users/viewuser?id=<?php echo $user->user_id ?>" class="table-link">
                                                            <span class="fa-stack pull-right">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                        </a>
                                                  <!--  </td>
                                                    <td style="width: 20%;">
                                                          <a href="#" class="table-link">
                                                            <span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                            </span>
                                                        </a>
                                                        fa fa-check-circle-o!-->
                                                       </td>
                                                </tr>
                                                   <?php endif; ?>
                                               <?php endforeach; ?>
                                          <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Delete?</h4>
          </div>
          <div class="modal-body">
              Are you sure you want to delete this user?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Cancel</span></button>
              <a href="<?php echo base_url('users/deactivate'); ?>" class="btn btn-primary pull-right">Yes</a>
          </div>
        </div>
      </div>
    </div>
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open('users/create'); ?>
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add New User</h4>
          </div>
          <div class="modal-body">
              <div class="form">
                 <div class="form-group">
                      <label for="User_Type">User Type:</label>
                      <?php if($this->session->userdata('is_admin')): ?>
                          <select name="usertype" id="" class="form-control">
                         <option value="0" selected disabled></option>
                          <?php foreach($user_types as $user_type): ?>
                             <?php if($user_type->ustype_id != 1): ?>
                                   <option value="<?php echo $user_type->ustype_id ?>"><?php echo $user_type->ustype_name ?></option>
                             <?php endif; ?>

                          <?php endforeach; ?>

                      </select>
                      <?php else: ?>
                          <p>Cashier</p>
                          <input type="hidden" name="usertype" value="3" />
                      <?php endif;?>
                  </div>
                  <div class="form-group">
                      <label for="branch">Branch:</label>
                       <?php if($this->session->userdata('is_admin')): ?>
                           <select name="branch" id="" class="form-control">
                             <option value="0" selected disabled></option>
                              <?php foreach($branches as $branch): ?>
                                 <option value="<?php echo $branch->br_id ?>"><?php echo $branch->br_name ?></option>
                              <?php endforeach; ?>

                          </select>
                       <?php else: ?>
                           <p><?php echo $this->session->userdata('branch'); ?></p>
                           <input type="hidden" name="branch" value="<?php echo $this->session->userdata('br_id'); ?>" />
                       <?php endif; ?>
                  </div>
                  <div class="form-group">
                      <label for="firstname">Firstname:</label>
                      <input type="text" class="form-control" name="firstname" />
                  </div>
                  <div class="form-group">
                      <label for="lastname">Lastname:</label>
                      <input type="text" class="form-control" name="lastname" />
                  </div>
                  <div class="form-group">
                      <label for="gender">Gender:</label>
                      <select name="gender" id="" class="form-control">
                          <option value="0" selected disabled>I am...</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="email">E-mail:</label>
                      <input type="text" class="form-control" name="email" />
                  </div>
                  <div class="form-group">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" name="username" />
                  </div>
                  <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" class="form-control" name="password" id="npass"/>
                       <span id="npass-notif" class="text-danger">
                  </div>
                  <div class="form-group">
                      <label for="vpass">Confirm password:</label>
                      <input type="password" class="form-control" name="vpassword" id="vpass" />
                      <span id="vpass-notif" class="text-danger">
                  </div>
              </div>
          </div>
          <div class="modal-footer">
             <button class="btn btn-primary">Add user <i class="fa fa-plus"></i></button>
          </div>
          </form>
        </div>
      </div>
    </div>
