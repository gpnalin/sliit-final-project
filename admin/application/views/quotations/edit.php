<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default bootstrap-admin-no-table-panel">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Edit User ( )</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                <form class="form-horizontal" action="<?php echo ADMIN_URL; ?>/users/updateuser/<?php echo $user_data->user_id; ?>" method="POST" >
                    <fieldset>                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="user_name">Username:</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="user_name" name="user_name" value="<?php echo $user_data->user_name; ?>" type="text" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="user_pass">Password:</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="user_pass" name="user_pass" type="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="user_email">Email:</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="user_email" name="user_email" value="<?php echo $user_data->user_email; ?>" type="email" required>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $user_data->user_id; ?>" />
                        <div class="pull-right">
                        <input type="reset" class="btn btn-default" value="Reset" />
                        <input type="submit" name="confirm_edit_user" class="btn btn-primary" value="Update User" />                        
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>