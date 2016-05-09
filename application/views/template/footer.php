<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Log out?</h4>
          </div>
          <div class="modal-body">
              Are you sure you want log out?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Cancel</span></button>
              <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-primary pull-right">Log out</a>
          </div>
        </div>
      </div>
    </div>
      <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/morrisjs/morris.min.js"></script>
    <script>

    $(function() {

      var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// Morris.Line({
//   element: 'line-morris',
//   data: [{
//     m: '2015-01', // <-- valid timestamp strings
//     a: 0,
//     b: 270
//   }, {
//     m: '2015-02',
//     a: 54,
//     b: 256
//   }, {
//     m: '2015-03',
//     a: 243,
//     b: 334
//   }, {
//     m: '2015-04',
//     a: 206,
//     b: 282
//   }, {
//     m: '2015-05',
//     a: 161,
//     b: 58
//   }, {
//     m: '2015-06',
//     a: 187,
//     b: 0
//   }, {
//     m: '2015-07',
//     a: 210,
//     b: 0
//   }, {
//     m: '2015-08',
//     a: 204,
//     b: 0
//   }, {
//     m: '2015-09',
//     a: 224,
//     b: 0
//   }, {
//     m: '2015-10',
//     a: 301,
//     b: 0
//   }, {
//     m: '2015-11',
//     a: 262,
//     b: 0
//   }, {
//     m: '2015-12',
//     a: 199,
//     b: 0
//   }, ],
//   xkey: 'm',
//   ykeys: ['a', 'b'],
//   labels: ['La huerta', 'Main Branch'],
//
//   xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
//     var month = months[x.getMonth()];
//     return month;
//   },
//   dateFormat: function(x) {
//     var month = months[new Date(x).getMonth()];
//     return month;
//   },
// });


    });
    </script>
    <!-- DataTables JavaScript -->
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" class="<?php echo base_url() ?>plugins/datatables-plugins/api/sum().js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>plugins/jQuery.print-master/jQuery.print.js"></script>
<script>
$(document).ready(function() {
    $('#photo-list').DataTable();

    var table = $('#photo-list').DataTable();
    console.log(table.column( 5 ).data().sum());
});
</script>
<script src="<?php echo base_url(); ?>js/custom.js"></script>
<script src="<?php echo base_url(); ?>node_modules/vue/dist/vue.min.js"></script>
<script src="<?php echo base_url(); ?>node_modules/vue-resource/dist/vue-resource.js" type="text/javascript"></script>
<script>

   var app = new Vue({
        el:'body',

        ready:function(){
            this.getcategories();
            this.getproducts(); 
        },
        data:{
            total:0,
            items:[],
            tQuantity:'',
            tpr_id:'',
            tpassword:'',
            br_id: '<?php echo $this->session->userdata('br_id'); ?>',
            voidHide:'hidden',
            hideThis:'',
            cash:'',
            changedue:'',
            transaction_id:'',
            categories:[],
            selcat:'',
            products:[],
            idToDelete:'',
        },
       computed: {
            // a computed getter
            changedue: function () {
              // `this` points to the vm instance

              var total = 0;
              if(this.cash != null && this.cash != '' && this.cash != 'NaN' && this.cash != '.'){
                var x = this.cash - this.total;
                  if((!(x < 0))){
                      total = x;
                  }
              }

                return total.toFixed(2) ;
            }
       },
        methods:{
                getIdToDelete:function($id){
                this.idToDelete = $id;
                },
           getproducts:function(){
             this.$http.get('<?php echo base_url('transaction/getProducts') ?>',function(result){
                this.products = result;
             });
           },
           getcategories:function(){
                this.$http.get('<?php echo base_url('transaction/getCategory') ?>',function(result){
                   this.categories = result;
                });
           },
            addItem:function(){
                  var temp_pr_id = this.tpr_id;
              $('#setQuantity').modal('hide');
              if (this.tQuantity != '' && this.tQuantity != 0) {
                this.$http.get('<?php echo base_url() ?>transaction/getItem',{pr_id:this.tpr_id,item_quantity:this.tQuantity},function(result){
                    console.log(result);
                      if(result == 0){
                          this.$http.get('<?php echo base_url() ?>transaction/getQuantity', {pr_id:temp_pr_id} ,function(x){
                                $('#messageContent').html('Only ' + x + ' item(s) available');
                                $('#messageItem').modal('show');
                                console.log(x);
                                $('body').removeAttr('style');
                          });
                      }else{
                        this.items.push(result[0]);
                      }

                });
              }else{
                $('#messageContent').html('Please! specify how many quantity.');
                $('#messageItem').modal('show');
              }
                this.tQuantity = '';
                this.tpr_id = '';
            },
            prepareItem:function(pr_id){

                this.$http.get('<?php echo base_url('transaction/checkProductQuantity') ?>',{ pr_id:pr_id },function(result){
                          if(result == 1){
                            this.tpr_id = pr_id;
                            $('#setQuantity').modal('show');
                            $('body').removeAttr('style');
                          }else{
                            $('#messageContent').html('Product Not Available');
                            $('#messageItem').modal('show');
                          }
                });
            },
            voidForm:function(){
              var itemNo = 0;
              for(var i in this.items){
                  if(this.items.hasOwnProperty(i)){
                      ++itemNo;
                  }
              }

              if(itemNo == 0){
                $('#messageContent').html('No Items to Void');
                $('#messageItem').modal('show');
                $('body').removeAttr('style');
              }else{
                  $('#void').modal('show');
                  $('body').removeAttr('style');
              }

            },
            voidItem:function(){
                $('#void').modal('hide');
                this.$http.get('<?php base_url() ?>transaction/voidItem',{password:this.tpassword, br_id:this.br_id},function(result){
                    var message = '';
                    if(result == 0){
                       $('#messageContent').html('Incorrect Password!');
                       $('#messageItem').modal('show');
                    }else{
                        this.voidHide = '';
                        this.hideThis = 'hidden';
                    }
                });
                this.tpassword = '';
            },
            saveTransaction:function(){

              this.$http.get('<?php base_url() ?>transaction/store',{transaction_id:this.transaction_id, items: this.items, total:this.total}, function(result){
                  if(result == 1){
                          $('#transaction_stats').modal('show');
                          $('body').removeAttr('style');
                            console.log(result);
                   }

              })
            },
            proceedCheckOut:function(){
              var itemNo = 0;
              for(var i in this.items){
                  if(this.items.hasOwnProperty(i)){
                      ++itemNo;
                  }
              }

              if(itemNo == 0){
                $('#messageContent').html('No Items to Checkout');
                $('#messageItem').modal('show');
                $('body').removeAttr('style');
              }else{
                  $('#checkoutModal').modal('show');
                  $('body').removeAttr('style');
              }
            },
            checkout:function(){
              // window.print();
            var x = this.cash < this.total || this.cash == '.';
            transaction_id = this.getTrID();
            if(x){
                 $('#messageContent').html('Invalid amount of cash');
                $('#messageItem').modal('show');
                $('body').removeAttr('style');
                this.cash = '';
             }else{
               this.total.toFixed(2);
                $('#receiptModal').modal('show');
                $('body').removeAttr('style');
             }

            },
            getTrID:function(){
                this.$http.get('<?php echo base_url() ?>transaction/generateid', function(result){
                    this.transaction_id = result;
                });
            },
            printreceipt:function(){
                self = this;

                self.prinTer();
                self.saveTransaction();
                this.items = [];
                this.cash = '';
                $('#messageItem').modal('show');
                $('#checkoutModal').modal('hide');
                $('#receiptModal').modal('hide');
                $('#messageContent').html('Transaction Success');
                $('body').removeAttr('style');
            },
            prinTer:function(){
              $("#print-holder, #photo-list").print({
                        globalStyles: true,
                        mediaPrint: false,
                        stylesheet: null,
                        noPrintSelector: ".no-print",
                        iframe: true,
                        append: null,
                        prepend: null,
                        manuallyCopyFormValues: true,
                        deferred: $.Deferred(),
                        timeout: 250,
                            title: null,
                            doctype: '<!doctype html>'
                });
            },
            removeItem:function(item){
                this.items.splice(item,1);
            },
            saveItemafterVoid:function(){
               this.voidHide = 'hidden';
               this.hideThis = '';
            },
            viewitems:function(i){
               this.$http.get('<?php echo base_url('transaction/viewitems') ?>',{tr_id:i}, function(result){
                      this.items = result;//listItems
                      $('#listItems').modal('show');
                      $('body').removeAttr('style');
               });
            }
        },
        filters:{
            pluckSum: function(list, key1, key2){
                self = this;
                return list.reduce(function(total, item) {
                    var totalTransact = total + (item[key1] * item[key2]);
                    self.total = totalTransact

                    return totalTransact
                }, 0)
            },
            filterProduct:function(products, scat){
              return products.filter(function(listofproducts){
                            if(scat == 0){
                               return listofproducts;
                            }else{
                              return listofproducts.cat_id == scat;
                            }
                       })
            }
        }
        
    })
   
</script>
</body>

</html>
