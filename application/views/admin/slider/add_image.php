<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!DOCTYPE html>
<html>
    <head>
    <link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 16px/24px normal 'Oxygen', sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PT. BEHAESTEX </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/admin/js/moment.js');?>"></script>
        <link href="<?php echo site_url('assets/admin/css/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo site_url('assets/admin/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/css/textext/textext.core.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/css/textext/textext.plugin.autocomplete.css');?>" type="text/css" />
        <script src="<?php echo site_url('assets/admin/js/textext.core.js');?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo site_url('assets/admin/js/textext.plugin.autocomplete.js');?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo site_url('assets/admin/js/textext.plugin.filter.js');?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo site_url('assets/admin/js/textext.plugin.ajax.js');?>" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/admin/js/tinymce/tinymce.min.js');?>"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: ".editor",
                theme : 'modern',
                skin : 'light',
                plugins: [
                    "advlist anchor autoresize autolink link image lists charmap print preview hr pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu template paste textcolor"
                ],
                /*content_css: "css/content.css",*/
                menu : { // this is the complete default configuration
                    table  : {title : 'Table' , items : 'inserttable tableprops deletetable | cell row column'},
                    view   : {title : 'View'  , items : 'visualaid'}
                },
                toolbar: "undo redo | paste pastetext | styleselect | bold italic underline strikethrough superscript subscript hr | formats | removeformat | alignleft aligncenter alignright alignjustify | bullist numlist | link image media | forecolor backcolor | more | code",
                setup: function(editor) {
                    editor.addButton('more', {
                        text: 'more...',
                        icon: false,
                        onclick: function() {
                            editor.insertContent('<!--more-->');
                        }
                    });
                },
                <?php
                if(!empty($uploaded_images))
                {
                echo 'image_list: [';
                $the_files = '';
                foreach($uploaded_images as $image)
                {
                $the_files .= '{title: \''.((strlen($image->title)>0) ? $image->title : $image->file).'\', value: \''.site_url('media/'.$image->file).'\'},';
                }
                echo rtrim($the_files,',');
                echo '],';
                }
                ?>
                image_class_list: [
                    {title: 'None', value: ''},
                    {title: 'Responsive', value: 'img-responsive'},
                    {title: 'Rounded', value: 'img-rounded'},
                    {title: 'Circle', value: 'img-circle'},
                    {title: 'Thumbnail', value: 'img-thumbnail'}
                ],
                image_dimensions: false,
                image_advtab: true,
                relative_urls: false,
                convert_urls: false,
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        </script>
    </head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"
                   href="<?php echo site_url('admin');?>">PT. BEHAESTEX</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><?php echo anchor('admin/contents/index/page','Halaman');?></li>
                    <li><?php echo anchor('admin/contents/index/category','Kategori');?></li>
                    <li><?php echo anchor('admin/contents/index/post','Postingan');?></li>
                    <!-- <li><?php echo anchor('admin/rake','RAKE Tool');?></li> -->
                    <li><?php echo anchor('admin/daftar_produk','Produk');?></li>
                    <li><?php echo anchor('admin/slider_banner','Slider Banner');?></li>
                    <li><?php echo anchor('admin/galeri_produk','Galeri Produk');?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Setingan<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo site_url('admin/master');?>">Setingan Web Portal</a></li>
                            </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->ion_auth->user()->row()->username;?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo site_url('admin/user/profile');?>">Halaman Profil</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('admin/user/logout');?>">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
  


<div id="container" class="container" style="padding-top:60px;">
	<h1>Add New Image</h1>

	<div id="body">
		<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
		<?= form_open_multipart('admin/slider_banner/add')?>

		  <div class="form-group">
		    <label for="userfile">Gambar File</label>
		    <input type="file" class="form-control" name="userfile">
		  </div>

		  <div class="form-group">
		    <label for="caption">Caption</label>
		    <input type="text" class="form-control" name="caption" value="">
		  </div>

		  <div class="form-group">
		    <label for="description">Diskripsi</label>
		    <textarea class="form-control" name="description"></textarea>
		  </div>

		  <button type="submit" class="btn btn-primary">Upload</button>
		  <?php anchor('admin/slider_banner/','Cancel',array('class'=>'btn btn-warning'))?>

		</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>