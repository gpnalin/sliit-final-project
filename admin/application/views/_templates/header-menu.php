        <!-- small navbar -->
        <nav class="navbar navbar-default bootstrap-admin-navbar" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="collapse navbar-collapse">
                            <a class="navbar-brand" href="<?php echo ADMIN_URL; ?>">Global Link Admin Dashboard</a>
                            <ul class="nav navbar-nav navbar-right"> 
                                <li><a href="<?php echo URL; ?>">Go to frontend <i class="glyphicon glyphicon-share-alt"></i></a></li>
                                <li class="dropdown">
                                    <a href="#" role="button" class="dropdown-toggle" data-hover="dropdown"> <i class="glyphicon glyphicon-user"></i> <?php echo Auth::getUserName(); ?> <i class="caret"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Settings <i class="glyphicon glyphicon-cog"></i></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li><a href="?logout">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

       