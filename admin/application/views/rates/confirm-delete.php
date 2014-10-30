<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default bootstrap-admin-no-table-panel">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Delete Rate (<?php echo $rate_data->rate_id; ?>)</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                <form class="form-horizontal" action="<?php echo ADMIN_URL; ?>/rates/delete/<?php echo $rate_data->rate_id; ?>/" method="POST" >                        
                        <div class="text-center">
                        <a class="btn btn-warning btn-lg" href="<?php echo ADMIN_URL; ?>/rates/" >Cancel</a>
                        <input type="submit" name="confirm_delete_rate" class="btn btn-danger btn-lg" value="Delete" />                        
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>