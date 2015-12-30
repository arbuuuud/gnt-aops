<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>{{Sysparam::getValue('web_title')}} - Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">

<!-- BEGIN GLOBAL MANDATORY STYLES -->
{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') }}
{{ HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}
{{ HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
{{ HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}
{{ HTML::style('assets/global/plugins/uniform/css/uniform.default.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE STYLES -->
{{ HTML::style('assets/global/plugins/select2/select2.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-summernote/summernote.css') }}
{{ HTML::style('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
@section('customcss') 
@show
<!-- END PAGE STYLES -->

<!-- BEGIN THEME STYLES -->
{{ HTML::style('assets/global/css/components.css') }}
{{ HTML::style('assets/global/css/plugins.css') }}
{{ HTML::style('assets/admin/layout/css/layout.css') }}
{{ HTML::style('assets/admin/layout/css/themes/default.css') }}
{{ HTML::style('assets/admin/layout/css/custom.css') }}
<!-- END THEME STYLES -->

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
<body class="page-header-fixed page-quick-sidebar-over-content page-boxed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
        {{ HTML::image( Sysparam::getValue('main_logo'), 'Logo', array( 'height' => '40px') ) }}
        {{Sysparam::getValue('web_title')}}
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <span class="username username-hide-on-mobile">
          {{ Auth::user()->email }} </span>
          <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{url('admin/profile')}}">
              <i class="icon-user"></i> Profil </a>
            </li>
            <li>
              <a href="{{url('/logout')}}">
              <i class="icon-key"></i> Log Out </a>
            </li>
          </ul>
        </li>
         <li class="back" style="padding: 14px 6px 12px 8px;">
          <span class="username username-hide-on-mobile">
          <a href="http://localhost/aops-client/login.php" style="color:#c5c5c5;">Back to GNT Club ></a></span>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
      </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li>
          <a href="{{ route('member.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
       <li><a href="{{ route('member.contacts.index') }}"><i class="fa fa-comment"></i> Contacts</a></li>
        <li>
          <a href="javascript:;">
            <i class="fa fa-cogs"></i> Settings
            <span class="arrow "></span>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('member.configuration') }}">
                <i class="fa fa-cogs"></i> Member Configuration</a>
              </li>
            </ul>
          </a>
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <!-- END SIDEBAR -->

  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      @section('content')
      @show
    </div>
  </div>
  <!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
  <div class="page-footer-inner">
    Hak Cipta &copy; {{Sysparam::getValue('web_title')}}
  </div>
  <div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
  </div>
</div>
<div class="modal"><!-- Place at bottom of page --></div>
<!-- END FOOTER -->
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
{{ HTML::script('assets/global/plugins/select2/select2.min.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-summernote/summernote.min.js') }}
{{ HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}
{{ HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/global/scripts/metronic.js') }}
{{ HTML::script('assets/admin/layout2/scripts/layout.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
{{ HTML::script('js/laravel.js') }}
@yield('pagelevel-js')
<script>
jQuery(document).ready(function() {
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  var host = "{{ url('/') }}";
  var table = $('.mpr_datatable');

  $.extend(true, $.fn.DataTable.TableTools.classes, {
      "container": "btn-group tabletools-btn-group pull-right",
      "buttons": {
          "normal": "btn btn-sm default",
          "disabled": "btn btn-sm default disabled"
      }
  });

  var oTable = table.dataTable({
      // set the initial value
      "pageLength": 10,
      "dom": "<'row'<'col-md-4 col-sm-12'l><'col-md-4 col-sm-12'f><'col-md-4 col-sm-12'T>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
      "order": [[ 0, 'desc']],
      "tableTools": {
          "sSwfPath": "{{ URL::asset('assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}",
          "aButtons": [{
              "sExtends": "pdf",
              "sButtonText": "PDF"
          }, {
              "sExtends": "csv",
              "sButtonText": "CSV"
          }, {
              "sExtends": "xls",
              "sButtonText": "Excel"
          }, {
              "sExtends": "print",
              "sButtonText": "Print",
              "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
              "sMessage": "Generated by DataTables"
          }]

      }
  });

  var table = $("#tableone").DataTable();
  
  $("select#member").on('change', function() {
    table.search(this.value).draw();
  }); 
  
  $('#summernote_1').summernote({
    height: 300,
    onImageUpload: function(files, editor, $editable) {
       sendFile(files[0],editor,$editable);
    }
  });
  $('.summernote').summernote({
    height: 300,
    onImageUpload: function(files, editor, $editable) {
       sendFile(files[0],editor,$editable);
    }
  });
  function sendFile(file,editor,welEditable) {
    data = new FormData();
    data.append("image", file);
      $.ajax({
          url: host+"/ajax/saveimage",
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          type: 'POST',
          success: function(url){
            editor.insertImage(welEditable, url);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus+" "+errorThrown);
         }
      });
    }
  $(".select2-multiple").select2();
  @section('customjs') 
  @show
});
$('span.filter_select').css('width','100px').detach().appendTo( "#styled-select" );
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>