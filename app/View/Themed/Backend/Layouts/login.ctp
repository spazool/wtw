<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <!-- bootstrap 3.0.2 -->
        <?php echo $this->Html->css('/css/bootstrap.min.css'); ?>
        <!--<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
        <!-- font Awesome -->
        <?php echo $this->Html->css('/css/font-awesome.min.css');?>
        <!--<link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <?php echo $this->Html->css('/css/AdminLTE.css'); ?>
        <!--<link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    
        </div>
        
        <!-- jQuery 2.0.2 -->
        <?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js');?>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <!-- Bootstrap -->
        <?php echo $this->Html->script('/js/bootstrap.min.js');?>
        <!--<script src="../../js/bootstrap.min.js" type="text/javascript"></script>-->        

    </body>
</html>