<script type="text/javascript">
window.onbeforeunload = function() {
      event.preventDefault();
  }
</script>
<div class="main-container container">
        <div class="row">
            <div class="col-md-8">
               <h3 class="title-header">Menu</h3>
               <hr>
                <div class="product-menu-list row">
                   <?php foreach($products as $product): ?>
                    <div class="product col-xs-2" v-on:click="prepareItem('<?php echo $product->pr_id ?>')">
                        <div class="product-img">
                             <a href="#"><img src="img/logo.png" alt="" class="img-responsive"></a>
                        </div>
                        <div class="product-name" >
                            <p class="text-center"><?php echo $product->pr_name ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="title-header">Cart</h3>
                <button type="button" name="button" class="btn btn-primary {{ hideThis }}" v-on:click="proceedCheckOut()">Proceed to checkout</button>
                <button type="button" name="button" class="btn btn-danger {{ hideThis }}" v-on:click="voidForm()">Void Item</button>
                <button type="button" name="button" class="btn btn-primary {{ voidHide }}" v-on:click="saveItemafterVoid()">Save Item</button>
                <hr>
                <div class="cart-list">
                   <div class="row">
                       <div class="col-xs-6"><b>Items</b></div>
                       <div class="col-xs-2"><b>Quantity</b></div>
                       <div class="col-xs-2"><b>Price</b></div>
                       <div class="col-xs-2"><b>Value</b></div>
                   </div>
                   <div class="row" v-for="i in items">
                       <div class="col-xs-6 ">
                            {{ i.item_name }}
                       </div>
                       <div class="col-xs-2 ">
                           {{ i.item_quantity }}
                       </div>
                       <div class="col-xs-2">
                           {{ i.item_price }}
                       </div>
                       <div class="col-xs-1">
                           {{ i.item_price * i.item_quantity }}
                       </div>
                       <div class="col-xs-1">
                          <button type="button" name="button" class="btn btn-warning {{ voidHide }}" v-on:click="removeItem($index)">x</button>
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-xs-12 total text-right"><b>TOTAL: ₱ {{ items | pluckSum 'item_price' 'item_quantity'}}</b></div>
                   </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Proceed to Checkout</h4>
      </div>
      <div class="modal-body">
        <div class="form">
      <div class="form-group">
          <label for="totaldue">Total Due</label>
          <input type="text" class="form-control" name="totaldue" v-model="total" disabled />
      </div>
        <div class="form-group">
          <label for="cash">Cash</label>
          <input type="text" class="form-control" name="cash" v-model="cash" id="productprice" />
        </div>
      <div class="form-group">
          <label for="changedue">Change Due</label>
          <input type="text" class="form-control" name="changedue"  v-model="changedue" disabled/>
      </div>
    </div>
  </div>
      <div class="modal-footer">
        <button type="button" name="button" class="btn btn-primary" v-on:click="checkout()">Checkout</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="setQuantity" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Set Item Quantity</h4>
  </div>
  <div class="modal-body">
      <input class="form-control" type="text" v-model="tQuantity" v-on:keyup.enter="addItem()" id="setQuantity"/>
  </div>
  <div class="modal-footer">
    <span class="text-sm">Hit enter to submit</span>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="void" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Enter Admin/Manager's Password</h4>
  </div>
  <div class="modal-body">
      <input class="form-control" type="password" v-model="tpassword" v-on:keyup.enter="voidItem()"/>
  </div>
  <div class="modal-footer">
    <span class="text-sm">Hit enter to submit</span>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="messageItem" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Message</h4>
  </div>
  <div class="modal-body">
      <div class="" id="messageContent">

      </div>
  </div>
  <div class="modal-footer">

  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Receipt</h4>
  </div>
  <div class="modal-body" id="print-holder">
      <div class="" id="receiptContent">
           <div class="logo-receipt">
              <img src="<?php echo base_url() ?>img/logo.png" alt="" class="img-responsive" />
           </div>
           <p class="text-center">
              Creativeink Printing & Manufacturing Company
           </p>
           <?php foreach($branches as $branch): ?>
              <p class="text-center">
                  <?php echo $branch->br_address; ?>
              </p>
             <?php endforeach; ?>
             <div class="row">
                <div class="col-xs-6">
                    <b>Cashier:</b> <?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?>
                </div>
                <div class="col-xs-6">
                    <span class="pull-right">
                       <b>Date:</b> <?php echo date('m/d/Y'); ?>
                    </span>
                </div>
                <div class="col-xs-6">
                    <b>Transaction ID:</b> <?php echo transaction_id ?>
                </div>
                <div class="col-xs-6">
                      <?php date_default_timezone_set('Asia/Taipei'); ?>
                      <span class="pull-right"><b>Time:</b> <?php echo date('h:i:s A'); ?></span>
                </div>
             </div>
             <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                          <template v-for="i in items">
                            <tr>
                                <td>{{ i.item_name }}</td>
                                <td>{{ i.item_quantity }}</td>
                                <td>{{ i.item_price }}</td>
                                <td>{{ i.item_price * i.item_quantity }}</td>
                            </tr>
                          </template>
                    </tbody>
                </table>
            </div>
      </div>
      <hr>
      <p class="text-right"><b>TOTAL:</b> {{ total }}</p>
      <p class="text-right"><b>Cash:</b> {{ cash }}</p>
      <p class="text-right"><b>Change Due:</b> {{ changedue }}</p>
  </div>
  <div class="modal-footer">
        <button type="button" name="button" class="btn btn-primary" v-on:click="printreceipt()">Print</button>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->