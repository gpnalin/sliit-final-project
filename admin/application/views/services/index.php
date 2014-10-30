<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Services</h1>
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
                <li class="active">Services</li>
            </ol>
        </div>
    </div>
</div>

<?php include_once('alerts.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default bootstrap-admin-no-table-panel">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Add New Service</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                <form class="form-horizontal" action="<?php echo ADMIN_URL; ?>/services/addservice" method="POST" >
                    <fieldset>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="service_type">Service Type:</label>
                            <div class="col-lg-10">
                                <label class="radio-inline">                                
                                  <input type="radio" name="service_type" class="service_type" value="sea" required> Sea Freight
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="service_type" class="service_type" value="air" required> Air Freight
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="service_type" class="service_type" value="d2d" required> Door-to-Door
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="service_name">Service Name:</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="service_name" name="service_name" type="text" required>
                            </div>
                        </div>
                        
                        <div class="pull-right">
                        <input type="reset" class="btn btn-default" value="Reset" />
                        <input type="submit" name="submit_add_service" class="btn btn-primary" value="Add Service" />                        
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Users</div>
                <div class="pull-right"><span class="badge"><?php echo $services_count;  ?></span></div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <table class="table bootstrap-admin-table-with-actions">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Service Type</th>
                            <th>Service Name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach ($services as $service) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php if (isset($service->service_id)) echo $service->service_id; ?></td>
                            <td><?php if (isset($service->service_type)) echo $service->service_type; ?></td>
                            <td><?php if (isset($service->service_name)) echo $service->service_name; ?></td>                            
                            <td class="actions text-right">
                                <a class="btn btn-sm btn-primary" href="<?php echo ADMIN_URL . '/services/updateservice/' . $service->service_id; ?>"> <i class="glyphicon glyphicon-pencil"></i> Edit </a>
                                <a class="btn btn-sm btn-danger"  href="<?php echo ADMIN_URL . '/services/deleteservice/' . $service->service_id; ?>"> <i class="glyphicon glyphicon-trash"></i> Delete </a>
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