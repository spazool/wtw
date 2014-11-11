<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<?php
if(!isset($meta_description)){
    $meta_description = 'Wheres the Wine provides a single click, no cost and easy-to-use site to search for wine-related events and activities in any area of South Africa.';
}
?>
<head>
    <meta charset="utf-8" />
    <title>Wheres the Wine | Wine Listings</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="<?php echo $meta_description; ?>" name="description" />
    <meta content="wine, tasting, events, wine events, festival, course" name="keywords" />
    <meta property="og:image" content="http://wheresthewine.co.za/img/FB_SHARER.JPG" />
    <meta property="og:title" content="Wheres the Wine | Wine Listings" />

    <?php
        echo $this->Html->meta(
            'favicon.ico',
            '/favicon.ico',
            array('type' => 'icon')
        );
    ?>
    <?php
    
    
    echo $this->Html->script('/plugins/jquery-1.10.1.min.js');
    echo $this->Html->css('/plugins/bootstrap/css/bootstrap.min.css');
    echo $this->Html->css('/plugins/bootstrap/css/bootstrap-responsive.min.css');
    echo $this->Html->css('/plugins/fancybox/source/jquery.fancybox.css');
    echo $this->Html->css('/plugins/font-awesome/css/font-awesome.min.css');
    echo $this->Html->css('/plugins/raty/jquery.raty.css');
    echo $this->Html->css('/css/frontend.css');
    echo $this->Html->css('/plugins/uniform/css/uniform.default.css');
    echo $this->Html->css('/plugins/jquery-ui/jquery-ui.min.css');
    echo $this->Html->css('/plugins/jquery-ui/jquery-ui.structure.min.css');
    echo $this->Html->css('/plugins/jquery-ui/jquery-ui.theme.min.css');
    echo $this->Html->css('/plugins/bootstrap-validator/bootstrapValidator.min.css');
    //js scripts
    
    ?>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
    <div id="header">
        <div class="row-fluid">
            <div id="logo" class="span7"><a href="/"></a></div>
            <div id="search" class="span5">
                <div class="mobile-menu-controls">Show/Hide Menu <i class="icon-expand-alt mobile-menu"></i></div>
                <div id="navbar">
                    <?php
                    echo $this->Html->link('EVENTS', array('controller' => 'events', 'action' => 'index'))?>
                    <span class="spacer">&nbsp;</span>
                    <?php
                    echo $this->Html->link('ABOUT US', array('controller' => 'pages', 'action' => 'about_us'))?>
                    <span class="spacer">&nbsp;</span>
                    <?php
                    echo $this->Html->link('CONTACT US', array('controller' => 'landings', 'action' => 'contact_us'))?>
                    <span class="spacer">&nbsp;</span>
                    <?php
                    if(isset($current_user)){
                        echo $this->Html->link('LOGOUT', array('controller' => 'users', 'action' => 'logout'));
                    } else {
                        echo $this->Html->link('LOGIN', array('controller' => 'users', 'action' => 'login'));
                    }
                    ?>
                    <span class="spacer">&nbsp;</span>
                    
                    
                    <?php
                    if(isset($current_user)){
                        echo $this->Html->link('MY EVENTS', array('controller' => 'events', 'action' => 'my_events'));
                    } else {
                        echo $this->Html->link('REGISTER', array('controller' => 'users', 'action' => 'register'));
                    }
                    ?>
                </div>
                <div id="searchbar">
                    <form id="search_form">
                        <input type="text" id="global_search" name="global_search" />
                        <a href="#" id="search_form_button"><span id="global_search_icon"><i class="icon-search"></i></span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="filters">
        <div class="mobile-filters-controls">Show/Hide Filters <i class="icon-filter mobile-filters"></i></div>
        <form action="/events/events_filter/" method="POST" id="filters_form">
        <div class="row-fluid">
            <div id="what" class="span4">
                <div class="filter-fields">
                    <span>WHAT</span>
                    <?php echo $this->Form->input('category',array('type' => 'select','empty' => ' All Events ','label' => false,'div' => false, 'id' => 'filter_what', 'selected' => $what_selected)); ?>
                 </div>
            </div>
            <div id="where" class="span4">
                <div class="filter-fields middle">
                    <span>WHERE</span>
                    <?php echo $this->Form->input('province',array('type' => 'select','empty' => ' All Regions ','label' => false,'div' => false, 'id' => 'filter_where', 'selected' => $where_selected)); ?>
                </div>
            </div>
            <div id="when" class="span4">
                <div class="filter-fields right">
                    <span>WHEN</span>
                    <?php echo $this->Form->input('when',array('type' => 'select','empty' => ' Anytime ','label' => false,'div' => false, 'id' => 'filter_when', 'selected' => $when_selected)); ?>
                </div>
            </div>
<!--            <div id="when" class="span3">
                <div class="filter-fields right">
                    <?php echo $this->Html->link('view all',array('controller' => 'events','action' => 'events_filter','null','null','null')); ?>
                </div>
            </div>-->
        </div>
        </form>
    </div>
    <div id="header-img"></div>
    <div id="wrapper-content" class="clearfix">
        <div id="main">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <div id="sidebar">
            
            <?php 
            foreach ($ads as $ad){ 
            ?>
            <div id="ad1" class="ad"><a href="<?php echo $ad['Advert']['destination']; ?>"><?php echo $this->Html->image('/img/adverts/' . $ad['Advert']['file']); ?></a></div>
            <?php    
            }
            
                    
            ?>
<!--            <div id="ad1" class="ad"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                 WtW_responsive_1 
                <ins class="adsbygoogle" 
                style="display:block" 
                data-ad-client="ca-pub-7436914276473593" 
                data-ad-slot="1708849467" 
                data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div id="ad1" class="ad">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                 wtw-small_rectangle-1 
                <ins class="adsbygoogle" 
                style="display:inline-block;width:180px;height:150px" 
                data-ad-client="ca-pub-7436914276473593" 
                data-ad-slot="4445003060"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>-->
        </div>
    </div>
    <div id="footer">
        <div class="row-fluid">
            <div class="span4">
                <h5>Where's the Wine</h5>
                2 Ebony Place, Hoogspring Avenue<br />
                Weltevreden Park, South Africa<br />
                [t] +27 11 476 9285<br />
                [e] <a href="mailto:sales@wheresthewine.co.za">sales@wheresthewine.co.za</a>
            </div>
            <div class="span4">
                <h5>&nbsp;</h5>
                <?php echo $this->Html->link('About us', array('controller' => 'pages', 'action' => 'about_us'));?><br />
                <?php echo $this->Html->link('Advertising', array('controller' => 'pages', 'action' => 'advertising'));?><br />
                <?php echo $this->Html->link('Contact us', array('controller' => 'landings', 'action' => 'contact_us'));?><br />
            </div>
            <div class="span4 connect">
                <h5>Connect with Us</h5>
                <div class="social-media clearfix">
                    <a href="https://www.facebook.com/wheresthewinesa" target="_blank"><i class="icon-facebook"></i></a>
                    <a href="https://twitter.com/wheresthewinesa" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="http://instagram.com/wheresthewinesa" target="_blank"><i class="icon-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4"></div>
            <div class="span4">Designed and Developed by <a href="http://www.pixelesque.co.za/">Pixelesque</a> and <a href="http://www.lineonline.co.za">Line Online</a></div>
            <div class="span4">Hosted by <a href="http://www.webafrica.co.za/aff.php?aff=74636">WebAfrica</a></div>
        </div>
    </div>
    <?php 
    echo $this->Html->script('/plugins/jquery-migrate-1.2.1.min.js');
    echo $this->Html->script('/plugins/bootstrap/js/bootstrap.min.js');
//    echo $this->Html->script('/plugins/back-to-top.js');
    echo $this->Html->script('/plugins/fancybox/source/jquery.fancybox.pack.js');
    echo $this->Html->script('/plugins/hover-dropdown.js');
    echo $this->Html->script('/scripts/app.js');
    echo $this->Html->script('/plugins/uniform/jquery.uniform.min.js');
    echo $this->Html->script('/plugins/uniform/jquery.uniform.min.js');
    echo $this->Html->script('/plugins/raty/jquery.raty.js'); //https://github.com/wbotelhos/raty
    echo $this->Html->script('/plugins/jquery-ui/jquery-ui.min.js');
    echo $this->Html->script('/plugins/bootstrap-validator/bootstrapValidator.min.js'); //http://http://bootstrapvalidator.com/
    echo $this->Html->script('frontend');
    
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
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4155332-2', 'auto');
  ga('send', 'pageview');

</script>
   
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>