<?php if ( $rates_model->errors OR $rates_model->messages ): ?>
<div class="row">
    <div class="col-xs-12">

        <?php if ($rates_model->errors): ?>
            <div class="alert alert-danger bootstrap-admin-alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php foreach ($rates_model->errors as $error) {
                    echo $error;
                } ?>
            </div>            
        <?php endif; ?>

        <?php if ($rates_model->messages): ?>            
            <div class="alert alert-success bootstrap-admin-alert">
                <button type="button" class="close" data-dismiss="alert">×</button>                
                <?php foreach ($rates_model->messages as $message) {
                    echo $message;
                } ?>
            </div>
        <?php endif; ?>   
        
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <a class="btn btn-primary btn-lg pull-right" href="<?php echo ADMIN_URL; ?>/rates/">Back</a>
    </div>
</div>
<?php endif; ?>