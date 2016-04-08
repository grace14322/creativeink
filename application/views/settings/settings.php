<div class="main-container container">
        <div class="dashboard-header row shadow">
            <div class="admin-sidebar col-md-4">
               <div class="row">
                   <?php $this->load->helper('sidebar_helper') ?>
               </div>
            </div>
            <div class="col-md-8">
                <?php $this->load->helper('alerts_helper'); ?>
                
                <h2>Settings</h2>
                <hr>
                <h3 class="text-justify general-label" id="general-label">General: <i class="fa fa-angle-double-down pull-right"></i></h3>
                <div id="gen" hidden>
                   <?php echo form_open('settings/updateinfo') ?>
                    <div class="form">
                        <div class="form-group">
                            <label for="fname">Firstname</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $this->session->userdata('firstname'); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="lname">Lastname</label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $this->session->userdata('lastname'); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="1" <?php echo ($this->session->userdata('gender') == 1) ? 'selected' : '' ?>>Male</option>
                                <option value="2" <?php echo ($this->session->userdata('gender') == 2) ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>
                        <?php if($this->session->userdata('is_admin')): ?>
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="username" class="form-control" name="username" value="<?php echo $this->session->userdata('username'); ?>" />
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata('email'); ?>" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="submit form-control btn btn-success">Save <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
                <h3 class="text-justify pass-label" id="pass-label">Change Password: <i class="fa fa-angle-double-down pull-right"></i></h3>
                <div id="pass" hidden>
                   <?php echo form_open('settings/updatepassword'); ?>
                    <div class="form">
                        <div class="form-group">
                            <label for="cpass">Current Password</label>
                            <input type="password" class="form-control" name="cpass" />
                        </div>
                        <div class="form-group">
                            <label for="npass">New Password</label>
                            <input type="password" class="form-control" name="npass" id="npass"/>
                            <span id="npass-notif" class="text-danger">
                                
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="vpass">Verify Password</label>
                            <input type="password" class="form-control" name="vpass"  id="vpass"/>
                            <span id="vpass-notif" class="text-danger">
                                
                            </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="submit form-control btn btn-success">Save <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    