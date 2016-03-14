<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="Content-Encoding" content="gzip" />
		<meta http-equiv="Accept-Encoding" content="gzip, deflate" />  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php echo $before_head;?>
        <title><?php echo $page_title;?></title>
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/bootstrap/css/bootstrap.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/bootstrap-table/src/bootstrap-table.css');?>">
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/bootstrap-table/bootstrap-editable.css');?>">
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/dataTables/dataTables.bootstrap.css');?>">
		<link rel="stylesheet" href="<?php echo site_url('assets/css/main.css');?> "  />
		<link rel="stylesheet" href="<?php echo site_url('assets/css/theme.css');?> " />
		<link rel="stylesheet" href="<?php echo site_url('assets/css/MoneAdmin.css');?> " />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/validationengine/css/validationEngine.jquery.css');?> " />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/Font-Awesome/css/font-awesome.css');?> " />
		<link href="<?php echo site_url('assets/css/jquery-ui.css');?>" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/uniform/themes/default/css/uniform.default.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/chosen/chosen.min.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/tagsinput/jquery.tagsinput.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/daterangepicker/daterangepicker-bs3.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/datepicker/css/datepicker.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/timepicker/css/bootstrap-timepicker.min.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/switch/static/stylesheets/bootstrap-switch.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/css/uploadfile.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap-select-min.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/plugins/timeline/timeline.css');?>" />
		
		
		<script src="<?php echo site_url('assets/plugins/jquery-2.0.3.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/validationengine/js/jquery.validationEngine.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js');?>"></script>
		<script src="<?php echo site_url('assets/js/jquery-ui.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/uniform/jquery.uniform.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/chosen/chosen.jquery.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/validVal/js/jquery.validVal.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/daterangepicker/moment.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/datepicker/js/bootstrap-datepicker.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/timepicker/js/bootstrap-timepicker.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/switch/static/js/bootstrap-switch.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/autosize/jquery.autosize.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/tagsinput/jquery.tagsinput.min.js');?>"></script>
		<script src="<?php echo site_url('assets/js/formsInit.js');?>"></script>
		<script src="<?php echo site_url('assets/js/jquery.uploadfile.min.js');?>"></script>
		<script src="<?php echo site_url('assets/js/jquery.form.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/jasny/js/bootstrap-inputmask.js');?>"></script>
		<script src="<?php echo site_url('assets/js/bootstrap-select.min.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/bootstrap-table/src/bootstrap-table.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/bootstrap-table/bootstrap-editable.js');?>"></script>
		<script src="<?php echo site_url('assets/plugins/bootstrap-table/src/extensions/editable/bootstrap-table-editable.js');?>"></script>
		
		


		<script>

				var MsgBox = (function() {
					"use strict";

					var elem,
						hideHandler,
						that = {};

					that.init = function(options) {
						elem = $(options.selector);
					};

					that.show = function(text) {
						clearTimeout(hideHandler);

						elem.find("span").html(text);
						elem.delay(200).fadeIn().delay(4000).fadeOut();
					};

					return that;
				}());

				 $(function () {
					MsgBox.init({
						"selector": ".bb-alert"
					});
				});
		</script>

		</head>
	
<body class="padTop53" >
		
<!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<?php echo site_url('admin');?>" class="navbar-brand">
                    <img src="<?php echo site_url('assets/img/logo.jpg');?>" alt="" />
                        
                        </a>
                </header>
                <!-- END LOGO SECTION -->
               

            </nav>

        </div>
        <!-- END HEADER SECTION -->

<?php
if($this->ion_auth->logged_in()) {
    ?>
                
 <!-- MAIN WRAPPER -->
    <div id="wrap" >
       	   
		
        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<?php echo site_url('admin');?>" class="navbar-brand">
                    <img src="<?php echo site_url('assets/img/logo.png');?>" alt="" />
                        
                        </a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo site_url('admin/user/profile');?>"><i class="icon-user"></i> User Profile </a>
							</li>
                            <li><a href="<?php echo site_url('admin/groups');?>"><i class="icon-group"></i> Groups </a>
                            </li>
                            <li><a href="<?php echo site_url('admin/users');?>"><i class="icon-user-md"></i> Users </a>
                            </li>
                            <li><a href="<?php echo site_url('admin/master');?>"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('admin/user/logout');?>"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left" style="margin-top: 10px;">
            <ul id="menu" class="collapse">   
                <li class="panel <?php echo (($menu_data['master']=='true')? 'active':'') ?>">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> Master     
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <!-- <span class="label label-default">10</span>--> &nbsp;
                    </a>
                    <ul class="<?php echo (($menu_data['class_master']=='in')? 'in':'collapse') ?>" id="component-nav">
                       
                        <li class="" id="menuGps" ><a href="<?php echo site_url('admin/gps');?>"><i class="icon-double-angle-right "></i> Gps Device</a> </li>
						<li class="" id="menuLayanan" ><a href="<?php echo site_url('admin/layanan');?>"><i class="icon-double-angle-right "></i> Layanan</a> </li>
						<li class="" id="menuPaket"><a href="<?php echo site_url('admin/paket');?>"><i class="icon-double-angle-right "></i> Paket </a> </li>
						<li class="" id="menuPendaftaran"><a href="<?php echo site_url('admin/pendaftaran');?>"><i class="icon-double-angle-right "></i> Pendaftaran</a> </li>
						<li class="" id="menuAlat"><a href="<?php echo site_url('admin/alat');?>"><i class="icon-double-angle-right "></i> Alat</a></li>
						<li class="" id="menuPetugas"><a href="<?php echo site_url('admin/petugas');?>"><i class="icon-double-angle-right "></i> Petugas</a></li>
						<li class="" id="menuMaps"><a href="<?php echo site_url('admin/maps');?>"><i class="icon-double-angle-right "></i> Maps</a></span></li>
					</ul>
                </li>

                <li class="panel <?php echo (($menu_data['transaksi']=='true')? 'active':'') ?>">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-table"></i> Transaksi
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <!-- <span class="label label-info">6</span> --> &nbsp;
                    </a>
                    <ul class="<?php echo (($menu_data['class_transaksi']=='in')? 'in':'collapse') ?>" id="pagesr-nav">
                       	<li class="" id="menuPemasangan"><a href="<?php echo site_url('admin/pemasangan');?>"><i class="icon-double-angle-right "></i> Pemasangan</a></li>
                    </ul>
                </li>
            
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i> 3 Level Menu
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="DDL-nav">
                        <li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL1-nav">
                                <i class="icon-sitemap"></i>&nbsp; Demo Link 1
	   
                        <span class="pull-right" style="margin-right: 20px;">
                            <i class="icon-angle-left"></i>
                        </span>


                            </a>
                            <ul class="collapse" id="DDL1-nav">
                                <li>
                                    <a href="#"><i class="icon-angle-right"></i> Demo Link 1 </a>

                                </li>
                                <li>
                                    <a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                                <li>
                                    <a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>

                            </ul>

                        </li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li>
                    </ul>
                </li>
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4-nav">
                        <i class=" icon-folder-open-alt"></i> 4 Level Menu
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="DDL4-nav">
                        <li>
                            <a href="#" data-parent="DDL4-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4_1-nav">
                                <i class="icon-sitemap"></i>&nbsp; Demo Link 1
	   
                        <span class="pull-right" style="margin-right: 20px;">
                            <i class="icon-angle-left"></i>
                        </span>


                            </a>
                            <ul class="collapse" id="DDL4_1-nav">
                                <li>

                                    <a href="#" data-parent="#DDL4_1-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4_2-nav">
                                        <i class="icon-sitemap"></i>&nbsp; Demo Link 1
	   
                        <span class="pull-right" style="margin-right: 20px;">
                            <i class="icon-angle-left"></i>
                        </span>
                                    </a>
                                    <ul class="collapse" id="DDL4_2-nav">



                                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 1 </a></li>
                                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                                    </ul>



                                </li>
                                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                                <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
                            </ul>

                        </li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 2 </a></li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 3 </a></li>
                        <li><a href="#"><i class="icon-angle-right"></i> Demo Link 4 </a></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!--END MENU SECTION -->



         <!--PAGE CONTENT -->
           <?php
			echo $this->postal->get();
			?>
<?php
}
?>