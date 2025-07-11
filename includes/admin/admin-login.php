<?php
/**
 * Adds client and TZO logo to login screen.
 * @return None
 */
function branded_login_tzo() { ?>
    <style>
    .login h1 a {
        width:320px;
        height:80px;
        background:url(<?php bloginfo( 'template_directory' ) ?>/includes/admin/images/logo-login.png) center center no-repeat;
    }

    .login #backtoblog, 
    .login #nav {
        text-align: center;
    }
    
    @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2) {
        .login h1 a {
            background-size: 320px 80px;
            background-image:url(<?php bloginfo( 'template_directory' ) ?>/includes/admin/images/logo-login@2x.png) }
    }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" ></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('body.login').append('<p style="color:#999;font-size:9px;text-align:center;margin-top:36px;">A CUSTOM THEME CRAFTED BY:<br><br><a id="timezoneone" title="TimeZoneOne" target="_blank" href="http://www.timezoneone.com"><img alt="timezoneone" src="<?php bloginfo( 'template_directory' ) ?>/includes/admin/images/tzo.svg" style="position:relative;" onerror="this.onerror=null; this.src=\'<?php bloginfo('template_url');?>/includes/admin/images/tzo.png\'" ></a></p>');
        });
    </script>
<?php }
add_action( 'login_enqueue_scripts', 'branded_login_tzo' );

//change logo url from wordpress.org to homepage
add_filter( 'login_headerurl', function(){return get_bloginfo( 'url' );});
add_filter( 'login_headertext',  function(){ return 'Home'; });

//TZO message in admin footer
add_filter('admin_footer_text', function(){ echo 'A custom theme crafted by <a href="http://www.timezoneone.com" target="_blank">TimeZoneOne</a> and powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.'; });
