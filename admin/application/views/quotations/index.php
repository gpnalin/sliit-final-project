<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Quotations</h1>
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
                <li class="active">Quotations</li>
            </ol>
        </div>
    </div>
</div>

<?php include_once('alerts.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Quotations</div>
                <div class="pull-right"><span class="badge"><?php echo $quotations_count;  ?></span></div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <table class="table bootstrap-admin-table-with-actions">
                    <thead>
                        <tr>
                            <th>Shiping Code</th>
                            <th>Service Type</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Current Status</th>
                            <th>Price</th>
                            <th class="text-center" style="width: 160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach ($quotations as $quotation) { ?>
                        <tr>                            
                            <td><?php if (isset($quotation->shiping_code)) echo $quotation->shiping_code; ?></td>
                            <td><?php if (isset($quotation->service_name)) echo $quotation->service_name; ?></td>
                            <td><?php if (isset($quotation->from_name)) echo $quotation->from_name; ?></td>
                            <td><?php if (isset($quotation->to_name)) echo $quotation->to_name; ?></td>
                            <td><?php if (isset($quotation->current_status)) echo $quotation->current_status; ?></td>
                            <td><?php if (isset($quotation->price)) echo $quotation->price; ?></td>
                                                      
                            <td class="actions text-right">
                                <a class="btn btn-sm btn-primary" href="<?php echo ADMIN_URL . '/quotations/edit/' . $quotation->quotation_id; ?>"> <i class="glyphicon glyphicon-pencil"></i> Edit </a>
                                <a class="btn btn-sm btn-danger"  href="<?php echo ADMIN_URL . '/quotations/delete/' . $quotation->quotation_id; ?>"> <i class="glyphicon glyphicon-trash"></i> Delete </a>
                            </td>
                        </tr>
                    <?php 
                    $i++;
                    } 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>