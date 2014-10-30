<!DOCTYPE html>
<html <?php Auth::isUserLoggedIn() ? 'class="bootstrap-admin-vertical-centered"' : '' ; ?> >
    <head>
        <title>Global Link Logistics - Admin Panel</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="<?php echo ADMIN_URL; ?>/ui/css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="<?php echo ADMIN_URL; ?>/ui/css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="<?php echo ADMIN_URL; ?>/ui/css/bootstrap-admin-theme.css">
        <!-- <link rel="stylesheet" media="screen" href="<?php echo ADMIN_URL; ?>/ui/css/bootstrap-admin-theme-change-size.css"> -->

        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="<?php echo ADMIN_URL; ?>/ui/js/html5shiv.js"></script>
           <script type="text/javascript" src="<?php echo ADMIN_URL; ?>/ui/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-without-padding">

    <?php if(Auth::isUserLoggedIn() == true): ?>

        <?php include_once('header-menu.php'); ?>
        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
            <?php include_once('main-side-menu.php'); ?>
            <!-- content -->
            <div class="col-md-10">
    <?php endif; ?>