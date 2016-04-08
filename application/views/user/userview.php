<div class="main-container container">
        <div class="dashboard-header row shadow">
            <div class="admin-sidebar col-md-4">
               <div class="row">
                   <?php $this->load->helper('sidebar_helper') ?>
               </div>
            </div>
            <div class="col-md-8">
                <?php $this->load->helper('alerts_helper') ?>
                <h2><?php echo $firstname ?> <?php echo $lastname ?></h2>
                <hr>
                <button class="btn btn-primary" data-toggle="modal" data-target="#userModal">Update User <i class="fa fa-pencil"></i></button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#passModal">Change Password <i class="fa fa-lock"></i></button>
                <article>
                    <p class="text-justify"><b>User type:</b> <?php echo $user_types ?></p>
                    <p class="text-justify"><b>Branch:</b> <?php echo $branch ?></p>
                    <p class="text-justify"><b>Gender:</b> <?php echo $gender ?></p>
                    <p class="text-justify"><b>E-mail:</b> <?php echo $email ?></p>
                    <p class="text-justify"><b>Username:</b> <?php echo $username ?></p>
                </article>
            </div>
        </div>
    </div>
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open('users/update'); ?>
          <input type="hidden" name="user_id"  value="<?php echo $user_id ?>" />
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update User</h4>
          </div>
          <div class="modal-body">
              <div class="form">
                 <div class="form-group">
                      <label for="User_Type">User Type:</label>
                      <?php if($this->session->userdata('is_admin')): ?>
                      <select name="usertype" id="" class="form-control">
                          <?php foreach($user_type as $user_typex): ?>
                             <?php if($user_typex->ustype_id != 1): ?>
                                   <option value="<?php echo $user_typex->ustype_id ?>" <?php echo (($user_typex->ustype_id == $ustype_id) ? 'selected' : '')  ?> ><?php echo $user_typex->ustype_name ?></option>
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
                          <?php foreach($branches as $branch): ?>
                             <option value="<?php echo $branch->br_id ?>" <?php echo (($branch->br_id == $br_id) ? 'selected' : '')  ?>><?php echo $branch->br_name ?></option>
                          <?php endforeach; ?>

                      </select>
                      <?php else: ?>
                           <p><?php echo $this->session->userdata('branch'); ?></p>
                           <input type="hidden" name="branch" value="<?php echo $this->session->userdata('br_id'); ?>" />
                       <?php endif; ?>
                  </div>
                  <div class="form-group">
                      <label for="firstname">Firstname:</label>
                      <input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>" />
                  </div>
                  <div class="form-group">
                      <label for="lastname">Lastname:</label>
                      <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>"/>
                  </div>
                  <div class="form-group">
                      <label for="gender">Gender:</label>
                      <select name="gender" id="" class="form-control">
                          <option value="1" <?php echo ($gender_id == 1) ? 'selected' : '' ?>>Male</option>
                          <option value="2" <?php echo ($gender_id == 2) ? 'selected' : '' ?>>Female</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="email">E-mail:</label>
                      <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
                  </div>
                  <div class="form-group">
                      <label for="username">Username:</label>
                      <p><?php echo $username ?></p>
                      <input type="hidden" class="form-control" name="username">
                  </div>
              </div>
          </div>
          <div class="modal-footer">
             <button class="btn btn-primary">Update user <i class="fa fa-pencil"></i></button>
          </div>
          </form>
        </div>
      </div>
    </div>

   <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open('users/changepass'); ?>
          <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Change Password</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="password">New Password:</label>
                  <input type="password" class="form-control" name="current" value="" id="npass" />
                  <span id="npass-notif" class="text-danger">
              </div>
          </div>
          <div class="modal-footer">
             <button class="btn btn-primary">Save <i class="fa fa-check"></i></button>
          </div>
          </form>
        </div>
      </div>
    </div>
