<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Rates</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="navbar navbar-default bootstrap-admin-navbar-thin">
            <ol class="breadcrumb bootstrap-admin-breadcrumb">
                <li>
                    <a href="<?php echo ADMIN_URL; ?>/">Dashboard</a>
                </li>                   
                <li class="active">Rates</li>
            </ol>
        </div>
    </div>
</div>

<?php include_once('alerts.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Rates</div>
                <div class="pull-right"><a href="<?php echo ADMIN_URL; ?>/rates/add/" class="btn btn-success btn-xs" >Add New Rate</a></div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <table class="table bootstrap-admin-table-with-actions">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Delivery Type</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Initial Charge</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($rates as $rate): ?>
                        <tr>                            
                            <td>    <?php if (isset($rate->rate_id))        echo $rate->rate_id; ?>         </td>
                            <td>    <?php if (isset($rate->s_name))         echo $rate->s_name; ?>          </td>
                            <td>    <?php if (isset($rate->c_from))         echo $rate->c_from; ?>          </td>
                            <td>    <?php if (isset($rate->c_to))           echo $rate->c_to; ?>            </td>
                            <td>    <?php if (isset($rate->initial_charge)) echo $rate->initial_charge; ?>  </td>                                                     
                            <td class="actions text-right">
                                <a class="btn btn-sm btn-primary" href="<?php echo ADMIN_URL . '/rates/edit/' . $rate->rate_id; ?>"> <i class="glyphicon glyphicon-pencil"></i> Edit </a>
                                <a class="btn btn-sm btn-danger"  href="<?php echo ADMIN_URL . '/rates/delete/' . $rate->rate_id; ?>"> <i class="glyphicon glyphicon-trash"></i> Delete </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>