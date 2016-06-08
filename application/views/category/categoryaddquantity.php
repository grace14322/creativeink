<div class="main-container container">
        <div class="dashboard-header row shadow">
            <div class="admin-sidebar col-md-4">
               <div class="row">
                   <?php $this->load->helper('sidebar_helper') ?>
               </div>
            </div>
            <div class="col-md-8">
                <?php $this->load->helper('alerts_helper'); ?>
                <h2>Update Product Quantity</h2>
                <hr>
                <form class="" action="<?php echo base_url('updateTheQuantity') ?>" method="post">
                  <?php foreach($prds as $prd): ?>
                    <div class="row">
                       <input type="hidden" name="pr_id[]" value="<?php echo $prd->pr_id ?>">
                       <div class="col-md-8"><?php echo $prd->pr_name ?></div>
                       <div class="col-md-4"><input type="text" name="quantityToAdd[]" class="form-control" placeholder="Enter quantity to add" ></div>
                    </div>
                    <br>
                  <?php endforeach; ?>
                  <input type="submit" name="save" value="add" class="btn btn-default pull-right" />
                </form>
            </div>
        </div>
    </div>
