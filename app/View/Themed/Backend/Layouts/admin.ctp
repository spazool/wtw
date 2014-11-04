<!DOCTYPE html>
<html class="bg-white">
    <head>
        <meta charset="UTF-8">
        <title>WTW | Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <!-- bootstrap 3.0.2 -->
        <?php echo $this->Html->css('/css/bootstrap.min.css'); ?>
        <!--<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
        <!-- font Awesome -->
        <?php echo $this->Html->css('/css/font-awesome.min.css');?>
        
        <?php echo $this->Html->css('/css/ionicons.min.css');?>
        <!--<link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <?php echo $this->Html->css('/css/AdminLTE.css'); ?>
        <!--<link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />-->
        <?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js');?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <header class="header">
            <a href="#" class="logo">
                WTW Admin
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success"><?php echo $ad_contact; ?></span>
                            </a>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning"><?php echo $ad_approve; ?></span>
                            </a>
                            
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $current_user['first_name'].' '.$current_user['last_name']; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <?php echo $this->Html->link('Sign Out', array('controller' => 'Users', 'action' => 'cloud_logout'), array('class' => 'btn btn-default btn-flat'));?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                        <div class="pull-left info">
                            <p>Hello, <?php echo $current_user['first_name'].' '.$current_user['last_name']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class='treeview'>
                            <a href='#'>Users</a>
                            <ul class='treeview-menu'>
                                <li>
                                    <?php echo $this->Html->link('All Users', array('controller' => 'Users', 'action' => 'cloud_index'));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Add User', array('controller' => 'Users', 'action' => 'cloud_add_user'));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Add Provider User', array('controller' => 'Users', 'action' => 'cloud_addProviderUser'));?>
                                </li>
                            </ul>
                        </li>
                        <li class='treeview'>
                            <a href='#'>Provider</a>
                            <ul class='treeview-menu'>
                                <li>
                                    <?php echo $this->Html->link('All Providers', array('controller' => 'Providers', 'action' => 'cloud_index'));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Add Provider', array('controller' => 'Providers', 'action' => 'cloud_add'));?>
                                </li>
                            </ul>
                        </li>
                        <li class='treeview'>
                            <a href='#'>Events</a>
                            <ul class='treeview-menu'>
                                <li>
                                    <?php echo $this->Html->link('Add Event', array('controller' => 'Events', 'action' => 'cloud_add_event'));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Upcoming Events', array('controller' => 'Events', 'action' => 'cloud_index'));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Past Events', array('controller' => 'Events', 'action' => 'cloud_past_events'));?>
                                </li>
                            </ul>
                        </li>
                        <li class='treeview'>
                            <a href='#'>Venues</a>
                            <ul class='treeview-menu'>
                                <li>
                                    <?php echo $this->Html->link('All Venue', array('controller' => 'Venues', 'action' => 'cloud_index'));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Add Venue', array('controller' => 'Venues', 'action' => 'cloud_add_venue'));?>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="../../index.html">
                                <i class="fa fa-dashboard"></i> <span>Listings</span>
                            </a>
                        </li>
                        <li>
                            <a href="../../index.html">
                                <i class="fa fa-dashboard"></i> <span>Events</span>
                            </a>
                        </li>
                        <li>
                            <a href="../../index.html">
                                <i class="fa fa-dashboard"></i> <span>Mailbox</span>
                            </a>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <aside class="right-side">
                
                    
                
                
                
                
            
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            
            </aside>
            
            
            
            
            
        </div>
        
                
        <!-- jQuery 2.0.2 -->
        
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <!-- Bootstrap -->
        <?php echo $this->Html->script('/js/bootstrap.min.js');?>
        
        <?php echo $this->Html->script('/js/plugins/datatables/jquery.dataTables.js');?>
        <?php echo $this->Html->script('/js/plugins/datatables/dataTables.bootstrap.js');?>
        
        <?php echo $this->Html->script('/js/AdminLTE/app.js');?>
        
        <?php
	echo $this->Js->writeBuffer();
	// Writes cached scripts
	?>
        

    </body>
</html>