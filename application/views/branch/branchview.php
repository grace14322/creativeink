<div class="main-container container">
        <div class="dashboard-header row shadow">
            <div class="admin-sidebar col-md-4">
               <div class="row">
                   <?php $this->load->helper('sidebar_helper') ?>
               </div>
            </div>
            <div class="col-md-8">
                <?php $this->load->helper('alerts_helper'); ?>
                <h2>Branch</h2>
                <hr>
                <?php if($this->session->userdata('is_admin')): ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#branchModal">
                        Update Branch <i class="fa fa-pencil"></i>
                    </button>
                <?php endif; ?>
                <p></p>
                <p class="text-justify"><b>Branch Name:</b> <?php echo $br_name; ?></p>
                <p class="text-justify"><b>Address:</b> <?php echo $br_address; ?></p>
            </div>
        </div>
    </div>
    
   <div class="modal fade" id="branchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open('branch/update'); ?>
           <input type="hidden" name="id" value="<?php echo $br_id ?>">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update Branch</h4>
          </div>
          <div class="modal-body">
              <div class="form">
                  <div class="form-group">
                      <label for="branchname">Branch Name</label>
                      <input type="text" class="form-control" name="branchname" value = "<?php echo $br_name ?>" />
                  </div>
                  <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" id="address" value="<?php echo $br_address ?>">
                  </div>
              </div>
          </div>
          <div class="modal-footer">
             <button class="btn btn-primary">Update <i class="fa fa-plus"></i></button>
          </div>
          </form>
        </div>
      </div>
    </div>