<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Wheres the Wine | Wine Listings</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php
    
    
    echo $this->Html->css('/plugins/bootstrap/css/bootstrap.min.css');
    echo $this->Html->css('/plugins/bootstrap/css/bootstrap-responsive.min.css');
    echo $this->Html->css('/plugins/fancybox/source/jquery.fancybox.css');
    echo $this->Html->css('/plugins/font-awesome/css/font-awesome.min.css');
    echo $this->Html->css('/css/reset.css');
    echo $this->Html->css('/css/style-metro.css');
    echo $this->Html->css('/css/style.css');
    echo $this->Html->css('/css/style-responsive.css');
    echo $this->Html->css('/css/themes/blue.css');
    echo $this->Html->css('/plugins/uniform/css/uniform.default.css');
    //js scripts
    
    ?>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
    <!-- BEGIN HEADER -->
    <!--begin header--> 
<center>
    <?php echo $this->Html->image('logo.png', array('align' => 'center','style' => array('width:40%'))); ?>
    
</center>
    
    <!-- END HEADER -->

    

    <!-- BEGIN CONTAINER -->   
    <div class="container min-hight">
        <div class="row-fluid">
        <div class="span12">
            <hr style="border-top: 4px solid #111; margin:5px;">
            
        </div>
            <?php echo $this->fetch('content'); ?>
    </div>
    </div>
   
    <!-- BEGIN COPYRIGHT -->
    <div class="front-copyright" style='background-color: #fff;'>
        <div class="container">
            <div class="span12" style="background-image:url('<?php echo $this->webroot; ?>img/bottom.jpg');background-size: cover; margin-left:0px;">
                <div class="row-fluid">
                
                    <div class="span3 left" style="background-color:rgba(225, 225, 225, 0.7);padding: 10px; margin-left:0px;">
                        <p style='color: #111; font-size:15px; font-weight:regular;'>Where's the Wine<br/><a href="mailto:sales@wheresthewine.co.za" style="color:black">sales@wheresthewine.co.za</a></p>
                    </div>
                    <div class='span6'></div>

                    <div class="span3 right" style="background-color:rgba(225, 225, 225, 0.7);padding: 10px;text-align:right;">
                        <p style='color: #111; font-size:15px; font-weight:regular;'>
                            <?php echo $this->Html->link('Contact Us', array('controller' => 'landings', 'action' => 'contact_us'),array('style' => 'color:black;'));?>
                            <br/>27 (0)82 558 6629</p>
                    </div>
                    
                </div>
                
                                
            </div>
        </div>
    </div>
    <!-- END COPYRIGHT -->
    <?php 
    echo $this->Html->script('/plugins/jquery-1.10.1.min.js');
    echo $this->Html->script('/plugins/jquery-migrate-1.2.1.min.js');
    echo $this->Html->script('/plugins/bootstrap/js/bootstrap.min.js');
//    echo $this->Html->script('/plugins/back-to-top.js');
    echo $this->Html->script('/plugins/fancybox/source/jquery.fancybox.pack.js');
    echo $this->Html->script('/plugins/hover-dropdown.js');
    echo $this->Html->script('/scripts/index.js');
    echo $this->Html->script('/scripts/app.js');
    echo $this->Html->script('/plugins/uniform/jquery.uniform.min.js');
    
    ?>
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->   
    <!-- END CORE PLUGINS -->
    
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
                        
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>