<div class="main-container container">
        <div class="dashboard-header row shadow">
            <div class="admin-sidebar col-md-4">
               <div class="row">
                   <?php $this->load->helper('sidebar_helper') ?>
               </div>
            </div>
            <div class="col-md-8">
                <h2>Dashboard</h2>
                <hr>
                <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#chart" aria-controls="chart" role="tab" data-toggle="tab">Charts</a></li>
                    <li role="presentation"><a href="#sales" aria-controls="sales" role="tab" data-toggle="tab">Sales</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="chart">
                        <ul>
                            <li>Sales Today: <b>PHP <?php echo $this->session->userdata('salesToday') ?></b></li>
                        </ul>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i>Monthly Sales Chart
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <?php foreach($branches as $branch): ?>
                                              <li><a href="<?php echo base_url('dashboard/branch') ?>?br_id=<?php echo $branch->br_id ?>"><?php echo $branch->br_name ?></a>
                                              </li>
                                            <?php endforeach; ?>
                                            <li class="divider"></li>
                                            <li><a href="<?php echo base_url('dashboard') ?>">View All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="line-morris" class="chart-holder"></div>
                            </div>
                            <!-- /.panel-body -->
                    </div>
                  </div>
                    <div role="tabpanel" class="tab-pane fade" id="sales">
                      <div class="table-responsive">
                          <table id="photo-list" class="display table-transaction" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Transaction ID</th>
                                    <th class="text-center">Cashier</th>
                                    <th class="text-center">Branch</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($transactions as $transaction): ?>
                                    <tr v-on:click="viewitems('<?php echo $transaction->tr_id ?>')" class="pointer " >
                                        <td class="text-center"><?php echo $transaction->date ?></td>
                                        <td class="text-center"><a href="#"><?php echo $transaction->tr_id ?></a></td>
                                        <td class="text-center"><?php echo $transaction->firstname.' '.$transaction->lastname ?></td>
                                        <td class="text-center"><?php echo $transaction->branch ?></td>
                                        <td class="text-center"><?php echo $transaction->total ?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        </div>
                        <button type="button" name="button" class="btn btn-primary pull-right" v-on:click="prinTer()">Print <i class="fa fa-print"></i></button>
                    </div>
                  </div>
                </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="listItems" tabindex="-1" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Items</h4>
      </div>
      <div class="modal-body">
          <div class="" id="itemContent">
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th class="text-center">Transaction ID</th>
                      <th class="text-center">Item</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Value</th>
                    </tr>
                </thead>
                      <tr  v-for="i in items">
                          <td class="text-center">{{ i.transaction_id }}</td>
                          <td class="text-center">{{ i.pr_name }}</td>
                          <td class="text-center">{{ i.quantity }}</td>
                          <td class="text-center">{{ i.price }}</td>
                          <td class="text-center">{{ i.quantity * i.price  }}</td>
                      </tr>
              </table>
          </div>
      </div>
      <div class="modal-footer">

      </div>

    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
        setTimeout(function(){
          $(function() {

            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

      Morris.Line({
        element: 'line-morris',
        data: <?php echo $dataforChart; ?>,
        xkey: 'm',
        ykeys: ['p'],
        labels: ['Gross Income'],
        resize:true,
        xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
          var month = months[x.getMonth()];
          return month;
        },
        dateFormat: function(x) {
          var month = months[new Date(x).getMonth()];
          return month;
        },
      });


          });
        },1000)
    </script>
