<div class="main-container container">
        <div class="dashboard-header row shadow">
            <div class="admin-sidebar col-md-4">
               <div class="row">
                   <?php $this->load->helper('sidebar_helper') ?>
               </div>
            </div>
            <div class="col-md-8">
                <?php $this->load->helper('alerts_helper'); ?>
                <h2>Category</h2>
                <hr>
                <?php if($this->session->userdata('is_admin')): ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                        Update Category <i class="fa fa-pencil"></i>
                    </button>
                <?php endif; ?>
                <p></p>
               <p class="text-justify"><b>Category Name:</b> <?php echo $cat_name; ?></p>
               
                      <div class="table-responsive dataTable_wrapper table-product">
                          <table id="photo-list" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text">Product Name:</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php if($products != 0): ?> 
                           <?php foreach($products as $product): ?>
                                <tr>
                                  <td class="cat-name">
                                       <span class="text-center"><?php echo $product->pr_name ?></span>
                                       <span class="pull-right"><a href="#" data-toggle="modal" data-target="#deleteprModal" class="btn btn-link"><i class="fa fa-trash"></i> delete</a> </span>
                                       <span class="pull-right"><a href="<?php echo base_url() ?>products/view?id=<?php echo $product->pr_id ?>" class="btn btn-link"><i class="fa fa-eye"></i> view</a></span>
                                  </td>
                               </tr>
                          <?php endforeach; ?>
                            <?php else: ?>
                                 <tr>
                                    <td class="text-center"><i>No Product yet.</i></td>
                                </tr>
                           <?php endif;?>
                            </tbody>
                        </table>
                      </div>                              
            </div>
        </div>
    </div>
 <div class="modal fade" id="deleteprModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Delete?</h4>
          </div>
          <div class="modal-body">
              Are you sure you want to delete this product?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Cancel</span></button>
              <a href="<?php echo base_url('category/deletepr'); ?>" class="btn btn-primary pull-right">Yes</a>
          </div>
        </div>
      </div>
 </div>
   <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open('category/update'); ?>
         <input type="hidden" name="id" value="<?php echo $cat_id ?>"> 
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
          </div>
          <div class="modal-body">
              <div class="form">
                  <div class="form-group">
                      <label for="category">Category Name</label>
                      <input type="text" class="form-control" name="categoryname" value="<?php echo $cat_name ?>" />
                      <input type="hidden" name="cat_id" value="<?php echo $cat_id ?>"> 
                  </div>
              </div>
          </div>
          <div class="modal-footer">
             <button class="btn btn-primary">Save <i class="fa fa-check"></i></button>
          </div>
          </form>
        </div>
      </div>
    </div>