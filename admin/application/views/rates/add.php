<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default bootstrap-admin-no-table-panel">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Add New Rate</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                <form class="form-horizontal" action="<?php echo ADMIN_URL; ?>/rates/add/" method="POST" >
                    <fieldset>

                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="service_type">Service Type:</label>
                            <div class="col-lg-10">
                                <label class="radio-inline">                                
                                  <input type="radio" name="service_type" class="service_type" value="sea" <?php //echo ( $service_data->service_type == 'sea' ) ? 'checked' : '' ; ?> required> Sea Freight
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="service_type" class="service_type" value="air" <?php //echo ( $service_data->service_type == 'air' ) ? 'checked' : '' ; ?> required> Air Freight
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="service_type" class="service_type" value="d2d" <?php //echo ( $service_data->service_type == 'd2d' ) ? 'checked' : '' ; ?> required> Door-to-Door
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="from_country">From Country:</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="from_country" name="from_country" required>
                                    <option value="">Select Country</option>
                                    <?php
                                    foreach($countries as $country){  
                                      echo '<option value="'. $country->country_code .'">'. $country->country_name .'</option>';
                                    } 
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="to_country">To Country:</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="to_country" name="to_country" required>
                                    <option value="">Select Country</option>
                                    <?php
                                    foreach($countries as $country){  
                                      echo '<option value="'. $country->country_code .'">'. $country->country_name .'</option>';
                                    } 
                                    ?>
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="initial_charge">Initial Charge:</label>
                            <div class="col-lg-10">
                                <div class="input-group">                              
                                  <input class="form-control" id="initial_charge" min="0" name="initial_charge" type="number" required>
                                  <div class="input-group-addon">USD</div>
                                </div>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="limit_under">W &lt; 15Kg Charge:</label>
                            <div class="col-lg-10">
                                <div class="input-group">                              
                                  <input class="form-control" id="limit_under" min="0" name="limit_under" type="number" required>
                                  <div class="input-group-addon">USD</div>
                                </div>                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="limit_over">W &gt; 15Kg Charge:</label>
                            <div class="col-lg-10">
                                <div class="input-group">                              
                                  <input class="form-control" id="limit_over" min="0" name="limit_over" type="number" required>
                                  <div class="input-group-addon">USD</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="unit_price">Unit Price:</label>
                            <div class="col-lg-10">
                                <div class="input-group">                              
                                  <input class="form-control" id="unit_price" min="0" name="unit_price" type="number" required>
                                  <div class="input-group-addon">USD</div>
                                </div> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="fuel_charge">Fuel Charge:</label>
                            <div class="col-lg-10">
                                <div class="input-group">   
                                  <input class="form-control" id="fuel_charge" min="0" name="fuel_charge" type="number" required>
                                  <div class="input-group-addon">USD</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="handling_fee">Handling Fee:</label>
                            <div class="col-lg-10">
                                <div class="input-group">                              
                                  <input class="form-control" id="handling_fee" min="0" name="handling_fee" type="number" required>
                                  <div class="input-group-addon">USD</div>
                                </div>                                   
                            </div>
                        </div>
                        
                        <div class="pull-right">
                        <input type="reset" class="btn btn-default" value="Reset" />
                        <input type="submit" name="submit_add_rate" class="btn btn-primary" value="Add New Rate" />                        
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
