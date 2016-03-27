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
                <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">Add New Category <i class="fa fa-plus"></i></button>
                <?php endif; ?>
                <div class="table-responsive dataTable_wrapper table-product">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-products">
                        <thead>
                            <tr>
                               <th>Category Name:</th>
                            </tr>
                        </thead>
                        <tbody> 
                          
                          <?php if($categories == 0): ?>
                                <tr>
                                    <td class="cat-name text-center"><i>No Category Yet</i></td>
                                </tr>
                          <?php else: ?>
                          <?php $num = 1; ?>
                            <?php foreach($categories as $category): ?>
                              <tr>
                                   <td class="cat-name">
                                       <span><i class="fa fa-pencil"></i></span>
                                       <span class="text-center"><?php echo $category->cat_name ?></span>
                                       <div class="col-md-3" id="edit-holder[<?php echo $num ?>]" hidden>
                                           <input type="text" class="form-control" value="<?php echo $category->cat_name ?>" id="edit[<?php echo $num ?>]">
                                       </div>
                                       <span class="pull-right"><a href="<?php echo base_url() ?>category/view?id=<?php echo $category->cat_id ?>" class="btn btn-link"><i class="fa fa-eye"></i> view</a></span>
                                   </td>
                               </tr>
                            <?php $num++; endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open('category/create'); ?>
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
          </div>
          <div class="modal-body">
              <div class="form">
                  <div class="form-group">
                      <label for="category">Category Name</label>
                      <input type="text" class="form-control" name="categoryname" />
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