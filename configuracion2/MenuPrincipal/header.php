<html>
    <head>
        <title>SIMA</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="/sima/style/reset.css" />
        <link rel="stylesheet" type="text/css" href="/sima/style/superfish.css" />
        <link rel="stylesheet" type="text/css" href="/sima/style/fancybox/jquery.fancybox.css" />
        <link rel="stylesheet" type="text/css" href="/sima/style/jquery.qtip.css" />
        <link rel="stylesheet" type="text/css" href="/sima/style/jquery-ui-1.9.2.custom.css" />
        <link rel="stylesheet" type="text/css" href="/sima/style/style.css" />
        <link rel="stylesheet" type="text/css" href="/sima/style/responsive.css" />
        <!--
        este tiene los cambios necesarios para  hacer que se vea bien 
        <link rel="stylesheet" type="text/css" href="style/style-test.css" />
        <link rel="shortcut icon" href="/sima/images/favicon.ico" />
        -->
        <!--<script src="js/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>-->
        <!--<script src="js/test-script/jquery.accordion.js" type="text/javascript" charset="utf-8"></script>-->
        <script src="/sima/js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/sima/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript" charset="utf-8"></script>
        <!--
        este es el min del js que tiene el accordion aparenmente este influye en la altura del accordion
        -->
        <!--
        todos estos no se para q son
        <script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
        <script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="js/jquery.carouFredSel-5.6.4-packed.js"></script>
        <script type="text/javascript" src="js/jquery.sliderControl.js"></script>
        <script type="text/javascript" src="js/jquery.linkify.js"></script>
        <script type="text/javascript" src="js/jquery.timeago.js"></script>
        <script type="text/javascript" src="js/jquery.hint.js"></script>
        <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
        <script type="text/javascript" src="js/jquery.isotope.masonry.js"></script>
        <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="js/jquery.qtip.min.js"></script>
        -->
        <script type="text/javascript" src="/sima/js/jquery.blockUI.js"></script>
        <!--
        <script src="js/main.js" type="text/javascript" charset="utf-8"></script>
        -->
        <script type="text/javascript" charset="utf-8">
            $(function() {
                $('#menuLateral').accordion({ autoHeight: false ,active:false,collapsible:true});
            });
        </script>
        </head>
    <body>
        <div class="site_container<?php echo ($_COOKIE['mc_layout'] == "boxed" ? ' boxed' : ''); ?>">
            <div class="header_container">
                <div class="header clearfix">
                    <div class="header_left">
                        <a href="/sima/MenuIndex.php" title="HLC">
                            <img src="/sima/images/logo.png" alt="logo" />
                            <!--<span class="logo">Hospital La Carlota</span>-->
                        </a>
                    </div>
                    <?php
                    require_once('menuGeneral.php');
                    ?>                    
                <!--</div>
            </div>-->      
