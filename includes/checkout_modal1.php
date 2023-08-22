
  <script>
                    function text(x) {
                        if (x == 0) document.getElementById("mycode").style.display = "block";
                        else document.getElementById("mycode").style.display = "none";
                        return;
                    }
                </script>
<div class="modal fade" id="checkout_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-shopping-cart"></i><b> Checkout...</b></h4>
            </div>
            <h3 class="text-center"><b>Confirm your order</b></h3> 

            <div class="modal-body">
              <form method="POST" action="ps_sale.php">
                <label for="name">Name</label>
                <input style="text-align: center;" type="text" id="customname" name="customname" style="width:100%;" class="form-control form-control-sm rounded-0" value="Chair" readonly>
                   <label for="confirmation">Transaction No.</label>
                 <input style="text-align: center;" type="confirmation" id="confirmation" name="confirmation" style="width:100%;" class="form-control form-control-sm rounded-0" value=<?php echo $confirmation; ?> readonly>
                 <label>Detail</label>
          <input style="text-align: center;" type="text" id="detail" name="detail" style="width:100%;" class="form-control form-control-sm rounded-0" value=<?php echo $detail; ?> readonly>
        
        <label>Color</label>
       <input style="text-align: center;" type="text" id="color" name="color" style="width:100%;" class="form-control form-control-sm rounded-0" value=<?php echo $color; ?> readonly>
                
                <label>Quantity</label>
                        <input style="text-align: center;" type="text" id="quantity" name="quantity" style="width:100%;" class="form-control form-control-sm rounded-0" value=<?php echo $quantity; ?> readonly>
                         <input type="hidden" name="total" id="total" value=<?php echo $total; ?> readonly> 
                        <h5><b>Total: &#8369; <?= number_format($total,2) ?></b></h5>
                        <input type="hidden" name="downpayment" id="downpayment" value=<?php echo $downpayment; ?> readonly> 
                       <!--  <h3><b>Order type:</b></h3> -->

                  <div class="col-2" style="text-align:center;">
                    <div class="input-group">
                         <div class="form-group col mb-0">
                    <!--  <h3 class="text-center"><b>Order type</b></h3> -->
                    </div>
                    <div class="p-t-10">

                            <label  class="form-check-label">
                                <input style="display: none;" type="radio" name="ordertype" class="form-control form-control-sm rounded-0" value="delivery" onclick="text(0)" checked />
                                <span  class="form-control form-control-sm rounded-0" style="border: px solid; width: 100%;  height: 25px; font-size: 9pt; overflow: hidden; text-align: center;">Delivery</span>
                            </label>
                            <label  class="form-check-label">
                                <input style="display: none;" type="radio" name="ordertype" class="form-control form-control-sm rounded-0" value="pickup" onclick="text(1)" />
                                <span  class="form-control form-control-sm rounded-0" style="border: 1px solid #ccc; width: 70px; height: 25px;  overflow: hidden;  text-align: center; font-size: 9pt;  top: 50%; margin-top: -7.5px;">Pick Up</span>
                                
                            </label>
                            
                        </div>
                        
                    </div>
                    
                </div>
                  
                    <div  id="mycode">

            <label>Province</label>
                    <select id="province" name="province" style="width:100%;" class="form-control form-control-sm rounded-0"></select>
                    <label>City</label>
                    <select id="city" name="town" style="width:100%;" class="form-control form-control-sm rounded-0"></select>
                    <label>Barangay</label>
                    <select id="barangay" name="barangay" style="width:100%;" class="form-control form-control-sm rounded-0"></select> 
                        

                
            </div>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script -->
        <script type="text/javascript">
            
            var my_handlers = {

           

                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
               
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

                $('#region').ph_locations({'location_type': 'regions'});
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#province').ph_locations('fetch_list');
            });
        </script>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="submit"><i class="fa fa-shopping-cart"></i> Order</button>
              </form>
            </div>
        </div>
    </div>
</div>
