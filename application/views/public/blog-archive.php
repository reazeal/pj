<!DOCTYPE html>
<html lang="en">
  <head>

   
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT. BEHAESTEX GROUP</title>

   <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets/home/img/favicon.png');?>"/>

    <link href="<?php echo site_url('assets/home/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/home/css/font-awesome.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo site_url('assets/home/css/superslides.css');?>">
    <link href="<?php echo site_url('assets/home/css/slick.css');?>" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo site_url('assets/home/css/animate.css');?>">  
    <link rel="stylesheet" href="<?php echo site_url('assets/home/css/elastic_grid.css');?>"> 
    <link rel='stylesheet prefetch' href='<?php echo site_url('assets/home/css/jquery.circliful.css');?>'>    
    <link id="orginal" href="<?php echo site_url('assets/home/css/themes/default-theme.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/home/style.css');?>" rel="stylesheet">
    <link href='<?php echo site_url('assets/home/css/opensans.css');?>' rel='stylesheet' type='text/css'>
    <link href='<?php echo site_url('assets/home/css/varella.css');?>' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    <style>
 body
 {
 font-family:arial;
 background:#FFF7E7;
 }

.t_data
 {
 border-collapse:collapse;
 }

.t_data tr th
 {
 font-size:12px;
 font-weight:bold;
 background:#A46D07;
 color:#FFFF00;
 padding:4px;
 }

.t_data tr td
 {
 font-size:12px;
 padding:4px;
 }

.t_data tr:hover
 {
 background:#C8FABF;

}

.halaman
 {
 margin:10px;
 font-size:11px;
 }

.halaman a
 {

padding:3px;
 background:#990000;
 -moz-border-radius:5px;
 -webkit-border-radius:5px;
 border:1px solid #FFA500;
 font-size:16px;
 font-weight:bold;
 color:#FFF;
 text-decoration:none;

}

	        
 </style>
  </head>
  <body> 
     <!-- BEGAIN PRELOADER -->
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>
    <!-- END PRELOADER -->

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top blog_menu" role="navigation"> 
          <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- LOGO -->

            <!-- TEXT BASED LOGO -->
           <!-- <a class="navbar-brand" href="#">Single<span>Pro</span></a>
           --> 
            <!-- IMG BASED LOGO  -->
            <!--  <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a> --> 
             <img src="<?php echo site_url('assets/home/img/favicon.png');?>" alt="logo">&nbsp;<span style="font-family: 'Varela', sans-serif; color: #fff !important; font-size: 20px;font-style: italic; font-weight: bolder;">PT. BEHAESTEX</span>
             
                   
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right main_nav">
              <li><a href="<?php echo site_url();?>">Home</a></li>           
              <li class="active"><a href="<?php echo site_url('blog/'); ?>">Blog</a></li>   
              <li> <span>
                   <a href="<?php echo base_url()."blog/index/en";?>"><img src="<?php echo site_url('assets/home/img/us.png');?>"></a>&nbsp;
                   <a href="<?php echo base_url()."blog/index/id";?>"><img src="<?php echo site_url('assets/home/img/id.png');?>"></a>
                   </span>
              </li>                   
            </ul>           
          </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->

    </header>
    <!--=========== End HEADER SECTION ================--> 

    <!--=========== BEGIN BLOG BANNER SECTION ================-->
    <!--<section id="blogBanner">
      <div class="container">
        <div class="row">
        <div class="col-lg-12 col-md-12">
          <h2>Blog Archive</h2>
        </div>
      </div>
      </div>
    </section>-->
    <!--=========== END BLOG BANNER SECTION ================-->

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog">
      <div class="container">
        <div class="row">         
          <div class="col-lg-8 col-md-8 col-sm-12">
            <!-- BEGAIN BLOG CONTENT -->
            <div class="blogarchive_content">   
            
            	
            	<?php
            	
            		
					 //kalo data tidak ada didatabase
					 if(empty($query))
					 {
					 echo "<tr><td colspan=\"6\">Tidak ada postingan yang dipublikasikan</td></tr>";
					 }else
					 {
					 $no = 1;
					 foreach($query as $row)
					 {
					 ?>
					 
					 	<div class="col-lg-6 col-md-6 col-sm-6">
		                  <div class="single_post wow fadeInUp">
		                    <div class="blog_img">
		                      <img src="<?php echo site_url('media/'.$row->file);?>" alt="img">
		                    </div>
		                    <h3><a href="<?php echo site_url($row->url); ?>"><?php 
		                    
		                     $artikel_judul = substr($row->page_title,0,52);
		                     echo $artikel_judul."..."; 
		                    ?></a></h3>
		                    <div class="post_commentbox">
		                      <a href="#"><i class="fa fa-user"></i><?php echo $row->created_by; ?></a>
		                      <span><i class="fa fa-calendar"></i><?php echo $row->created_at; ?></span>
		                      <a href="#"><i class="fa fa-tags"></i><?php echo $row->language_slug; ?></a>
		                    </div>
		                    
		                    <?php
		                     $artikel = substr($row->content,0,160);
		                     echo $artikel."..."; 
		                    ?>
		                    <a href="<?php echo site_url($row->url); ?>" class="read_more">Read More <i class="fa fa-angle-double-right">  </i></a>                   
		                  </div>
               			</div>
                
						
					 <?php
					 	$no++;
					 }}
					 ?>
 
            </div>
            <nav>
              <div class="pagination wow fadeInLeft">
                  <div class="halaman"><h4>Halaman : <?php 
                   if(empty($halaman))
					 {
					 	echo "<strong>1</strong>";
					 }else{
						echo $halaman;
                  	 }
                  
                  ?></h4></div>
              </div>
          	</nav>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- Start blog sidebar -->
            <div class="blog_sidebar">
              
              <!-- Start single sidebar -->
              <div class="single_blogsidebar">
                <h2>Newest Blog</h2>
                <ul class="popular_tab">
                
                <?php
					 //kalo data tidak ada didatabase
					 if(empty($kategori))
					 {
					 echo "<li>Tidak ada postingan yang dipublikasikan</li>";
					 }else
					 {
					 $no = 1;
					 foreach($kategori as $data_kategori)
					 {
					 ?>
					 
					 <li>
	                    <div class="media">
	                      <div class="media-left">
	                        <a class="news_img" href="#">
	                          <img class="media-object" src="<?php echo site_url('media/'.$data_kategori->file);?>" alt="img">
	                        </a>
	                      </div>
	                      <div class="media-body">
	                       <a href="<?php echo site_url($data_kategori->url); ?>">
	                       	<?php 
		                    
		                     $artikel_judul = substr($data_kategori->page_title,0,52);
		                     echo $artikel_judul."..."; 
		                    ?>
	                       	
	                       </a>
	                       <span class="feed_date"><?php echo $data_kategori->created_by; ?></span>
	                      </div>
	                    </div>
	                  </li>
                  	
					 <?php
					 	$no++;
					 }}
					 ?>
				                
                </ul>
              </div>
              <!-- End single sidebar -->
              
              <!-- Start single sidebar -->
              <div class="single_blogsidebar">
                <h2>Category</h2>
                <ul class="catg_nav">
                
                	 <?php
					 //kalo data tidak ada didatabase
					 if(empty($kategori_beneran))
					 {
					 echo "<li>Tidak ada postingan yang dipublikasikan</li>";
					 }else
					 {
					 $no = 1;
					 foreach($kategori_beneran as $data_kategori2)
					 {
					 ?>
					 
					  <li class="cat-item"><a href="<?php echo site_url('blog/category/'.$data_kategori2->content_id); ?>"><?php echo $data_kategori2->title; ?></a></li>
                  	
					 <?php
					 	$no++;
					 }}
					 ?>
					 
                    
                  </ul>
              </div>
              <!-- End single sidebar -->
              <!-- Start single sidebar -->
              <div class="single_blogsidebar">
                <h2>Tags</h2>
                <div class="tagcloud">
                 <?php
                	foreach ($data_content_category as $axt) {
                		if($axt['page_keywords']!=''){
							 echo "<a href=\"".site_url('blog/tags/'.$axt['page_keywordc'])."\"><i class=\"fa fa-tags\"></i>".$axt['page_keywords']."</a>";	
						}
					}
                	
                	?>
                </div>
              </div>
              <!-- End single sidebar -->
              <!-- Start single sidebar -->
             <!-- <div class="single_blogsidebar">
                <h2>Blog Archive</h2>
                <select class="postform">
                  <option value="-1">Select Category</option>
                  <option value="4" class="level-0">Life styles</option>
                  <option value="3" class="level-0">Sports</option>
                  <option value="2" class="level-0">Technology</option>
                  <option value="5" class="level-0">Treads</option>
                </select>
              </div>-->
              <!-- End single sidebar -->
                   <!-- Start single sidebar -->
              <div class="single_blogsidebar">
                <h2>Calendar Event</h2>
                <?php 
                $data_hari = array();
                foreach ($days as $ax) :
                  $data_hari[$ax->hari] = $ax->nama_event;
                 endforeach;
                 echo $this->calendar->generate($calendar['year'],$calendar['month'],$data_hari);
                ?>
              </div> 
              
              <div class="single_blogsidebar" >
                <h2>Links</h2>
                <ul>
                  <li><a href="https://mail.behaestex.co.id">Email BHS</a></li>
                  <li><a href="#">Links 2</a></li>
                  <li><a href="#">Links 3</a></li>
                  <li><a href="#">Links 4</a></li>
                </ul>
              </div>
              <!-- End single sidebar -->
            </div>
            <!-- End blog sidebar -->
          </div>
        </div>
      </div>
    </section>
    <!--=========== END BLOG SECTION ================-->


     <!--=========== BEGAIN FOOTER ================-->
     <footer id="footer">
       <div class="container">
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_left">
				<!--=========== Designed By WpFreeware Team ================-->
                <p>&copy;2015 PT. BEHAESTEX GROUP <br/>
               Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
               </p>
			   <!--=========== Designed By WpFreeware Team ================-->
             </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_right">
               <ul class="social_nav">
                  <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.behaestex.co.id/blog"><i class="fa fa-facebook"></i></a></li>
                 <li><a href="https://twitter.com/share?text=https://www.behaestex.co.id/blog"><i class="fa fa-twitter"></i></a></li>
                 <li><a href="https://plus.google.com/share?url=https://www.behaestex.co.id/blog"><i class="fa fa-google-plus"></i></a></li>
                 <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.behaestex.co.id/blog&title=PT. Behaestex Blog &summary=Blogging BTX&source=www.behaestex.co.id"><i class="fa fa-linkedin"></i></a></li>
               </ul>
             </div>
           </div>
         </div>
       </div>
      </footer>
      <!--=========== END FOOTER ================-->

     <!-- Javascript Files
     ================================================== -->
  
      <!-- initialize jQuery Library -->
    <script src="<?php echo site_url('assets/home/js/jquery.min.js');?>"></script>
    <!-- Google map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="<?php echo site_url('assets/home/js/jquery.ui.map.js');?>"></script>
     <!-- For smooth animatin  -->
    <script src="<?php echo site_url('assets/home/js/wow.min.js');?>"></script> 
    <!-- Bootstrap js -->
    <script src="<?php echo site_url('assets/home/js/bootstrap.min.js');?>"></script>
    <!-- superslides slider -->
    <script src="<?php echo site_url('assets/home/js/jquery.superslides.min.js');?>" type="text/javascript"></script>
    <!-- slick slider -->
    <script src="<?php echo site_url('assets/home/js/slick.min.js');?>"></script>    
    <!-- for circle counter -->
    <script src='<?php echo site_url('assets/home/js/jquery.circliful.min.js');?>'></script>
    <!-- for portfolio filter gallery -->
    <script src="<?php echo site_url('assets/home/js/modernizr.custom.js');?>"></script>
    <script src="<?php echo site_url('assets/home/js/classie.js');?>"></script>
    <script src="<?php echo site_url('assets/home/js/elastic_grid.min.js');?>"></script>
    <script src="<?php echo site_url('assets/home/js/portfolio_slider.js');?>"></script>
    <script src="<?php echo site_url('assets/home/js/tooltips.js');?>"></script>
    <script>
		$(function() {
			$("#single_blogsidebar2 a[title]").tooltips();
		});
	</script>

    <!-- Custom js-->
    <script src="<?php echo site_url('assets/home/js/custom.js');?>"></script>
    
  </body>
</html>