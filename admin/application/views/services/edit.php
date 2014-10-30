<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default bootstrap-admin-no-table-panel">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Edit Service ( )</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                <form class="form-horizontal" action="<?php echo ADMIN_URL; ?>/services/updateservice/<?php echo $service_data->service_id; ?>" method="POST" >
                    <fieldset>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="service_type">Service Type:</label>
                            <div class="col-lg-10">
                                <label class="radio-inline">                                
                                  <input type="radio" name="service_type" class="service_type" value="sea" <?php echo ( $service_data->service_type == 'sea' ) ? 'checked' : '' ; ?> required> Sea Freight
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="service_type" class="service_type" value="air" <?php echo ( $service_data->service_type == 'air' ) ? 'checked' : '' ; ?> required> Air Freight
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="service_type" class="service_type" value="d2d" <?php echo ( $service_data->service_type == 'd2d' ) ? 'checked' : '' ; ?> required> Door-to-Door
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="service_name">Service Name:</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="service_name" name="service_name" value="<?php echo $service_data->service_name; ?>" type="text" required>
                            </div>
                        </div>

                        <input type="hidden" name="service_id" value="<?php echo $service_data->service_id; ?>" />
                        <div class="pull-right">
                        <input type="reset" class="btn btn-default" value="Reset" />
                        <input type="submit" name="confirm_edit_service" class="btn btn-primary" value="Update Service" />                        
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>