<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>MPR RI - Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') }}
{{ HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}
{{ HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
{{ HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}
{{ HTML::style('assets/global/plugins/uniform/css/uniform.default.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME STYLES -->
{{ HTML::style('assets/global/css/components.css') }}
{{ HTML::style('assets/global/css/plugins.css') }}
{{ HTML::style('assets/admin/layout/css/layout.css') }}
{{ HTML::style('assets/admin/layout/css/themes/default.css') }}
{{ HTML::style('assets/admin/layout/css/custom.css') }}
<!-- END THEME STYLES -->

<!-- BEGIN PAGE STYLES -->
{{ HTML::style('assets/admin/pages/css/login-soft.css') }}
<!-- END PAGE STYLES -->

<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    {{ HTML::image( 'img/logo-mpr.png', 'MPR', array( 'height' => '150px') ) }}
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content text-center">
  <h4 class="text-white">Website is currently under construction, please come back later.</h4>
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
  Hak Cipta &copy; Sekretariat Jendral MPR RI 2015
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

{{ HTML::script('assets/global/plugins/jquery.min.js') }}
{{ HTML::script('assets/global/plugins/jquery-migrate.min.js') }}
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{{ HTML::script('assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}
{{ HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
{{ HTML::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ HTML::script('assets/global/plugins/jquery.blockui.min.js') }}
{{ HTML::script('assets/global/plugins/jquery.cokie.min.js') }}
{{ HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script('assets/global/plugins/backstretch/jquery.backstretch.min.js') }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/global/scripts/metronic.js') }}
{{ HTML::script('assets/admin/layout2/scripts/layout.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>