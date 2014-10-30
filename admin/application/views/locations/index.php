<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Locations to be update</h1>
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
                <li class="active">Users</li>
            </ol>
        </div>
    </div>
</div>

<?php include_once('alerts.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default bootstrap-admin-no-table-panel">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Add New User</div>
            </div>
            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                <form class="form-horizontal" action="<?php echo ADMIN_URL; ?>/users/adduser" method="POST" >
                    <fieldset>                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="user_name">Username:</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="user_name" name="user_name" type="text" required>
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
                                <input class="form-control" id="user_email" name="user_email" type="email" required>
                            </div>
                        </div>
                        <div class="pull-right">
                        <input type="reset" class="btn btn-default" value="Reset" />
                        <input type="submit" name="submit_add_user" class="btn btn-primary" value="Create User" />                        
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
                <div class="pull-right"><span class="badge"><?php echo $users_count;  ?></span></div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <table class="table bootstrap-admin-table-with-actions">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php if (isset($user->user_id)) echo $user->user_id; ?></td>
                            <td><?php if (isset($user->user_name)) echo '@'.$user->user_name; ?></td>
                            <td>
                                <?php if (isset($user->user_email)) { ?>
                                    <a href="mailto:<?php echo $user->user_email; ?>" ><?php echo $user->user_email; ?></a>
                                <?php } ?>
                            </td>                            
                            <td class="actions text-right">
                                <a class="btn btn-sm btn-primary" href="<?php echo ADMIN_URL . '/users/updateuser/' . $user->user_id; ?>"> <i class="glyphicon glyphicon-pencil"></i> Edit </a>
                                <a class="btn btn-sm btn-danger"  href="<?php echo ADMIN_URL . '/users/deleteuser/' . $user->user_id; ?>"> <i class="glyphicon glyphicon-trash"></i> Delete </a>
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