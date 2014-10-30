<?php if ( $users_model->errors OR $users_model->messages ): ?>
<div class="row">
    <div class="col-xs-12">

        <?php if ($users_model->errors): ?>
            <div class="alert alert-danger bootstrap-admin-alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php foreach ($users_model->errors as $error) {
                    echo $error;
                } ?>
            </div>            
        <?php endif; ?>

        <?php if ($users_model->messages): ?>            
            <div class="alert alert-success bootstrap-admin-alert">
                <button type="button" class="close" data-dismiss="alert">×</button>                
                <?php foreach ($users_model->messages as $message) {
                    echo $message;
                } ?>
            </div>
        <?php endif; ?>   
        
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <a class="btn btn-primary btn-lg pull-right" href="<?php echo ADMIN_URL; ?>/users/">Back</a>
    </div>
</div>
<?php endif; ?>