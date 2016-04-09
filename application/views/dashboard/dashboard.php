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
                          <table id="photo-list" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction ID</th>
                                    <th>Cashier</th>
                                    <th>Branch</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($transactions as $transaction): ?>
                                    <tr>
                                        <td><?php echo $transaction->date ?></td>
                                        <td><?php echo $transaction->tr_id ?></td>
                                        <td><?php echo $transaction->firstname.' '.$transaction->lastname ?></td>
                                        <td><?php echo $transaction->branch ?></td>
                                        <td><?php echo $transaction->total ?></td>
                                    </tr>
                                <?php endforeach;?>


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
