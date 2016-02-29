<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT. BEHAESTEX GROUP</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"           content="<?php echo site_url();?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="BLOG PT. BEHAESTEX GROUP" />
    <meta property="og:description"   content="PT. BEHAESTEX" />
    <meta property="og:image"         content="<?php echo site_url('assets/home/img/favicon.png');?>" />

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
 <!--   <section id="blogBanner">
      <div class="container">
        <div class="row">
        <div class="col-lg-12 col-md-12">
          <h2></h2>
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
            <div class="blogdetails_content">   
            <?php 
            
            foreach($data_content_blog as $data_content)
			 {
			 	 $created_by = $data_content['created_by'];
			 	 $created_at = $data_content['created_at'];
			 	 $language_slug = $data_content['language_slug'];
			 	 $file = $data_content['file'];
			 	 $content = $data_content['content'];
			 	 $page_title = $data_content['page_title'];
			 	 $updated_at = $data_content['updated_at'];
			 	 $updated_by = $data_content['updated_by'];
			 	 $url = $data_content['url'];
			 	
			 }
            
            ?>                          
              <h2><?php echo $page_title; ?></h2>
              <div class="post_commentbox">
                <a href="#"><i class="fa fa-user"></i><?php echo $created_by; ?></a>
                <span><i class="fa fa-calendar"></i><?php echo $created_at; ?></span>
                <a href="#"><i class="fa fa-tags"></i><?php echo $language_slug; ?></a>
              </div>
              <img class="img-center" src="<?php echo site_url('media/'.$file);?>" alt="img">
              <?php
               
                echo $content;
               
                if($updated_at!=''){
	               	echo "<div class=\"post_commentbox\">";
				   	echo "<span><i class=\"fa fa-calendar\"></i>".$created_at." Edited by ".$updated_by."</span>";
				   	echo "</div>";
			   }
			   
               ?>
               
              <!-- Start social share -->
              <div class="social_link">
              
              <div id="fb-root"></div>
			    <script>(function(d, s, id) {
			      var js, fjs = d.getElementsByTagName(s)[0];
			      if (d.getElementById(id)) return;
			      js = d.createElement(s); js.id = id;
			      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
			      fjs.parentNode.insertBefore(js, fjs);
			    }(document, 'script', 'facebook-jssdk'))
			    ;</script>
    
                <ul class="sociallink_nav">
                  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo site_url($url);?>"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://twitter.com/share?text=<?php echo site_url($url);?>"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="https://plus.google.com/share?url=<?php echo site_url($url);?>"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo site_url($url);?>&title=<?php echo $page_title;?>&summary=<?php echo $page_title;?>&source=www.behaestex.co.id"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="https://pinterest.com/pin/create/button/?url=<?php echo site_url($url);?>&description=<?php echo $page_title;?>"><i class="fa fa-pinterest"></i></a></li>
                </ul>
              </div>
              <!-- End social share -->
            </div>
            <!-- Start single blog navigation -->
            <div class="post_navigation">
            
            <?php 
            
             foreach($data_content_link as $link_data)
			 {
			 	 $url_next = $link_data['url_next'];
			 }
			 
			 foreach($data_content_link2 as $link_data2)
			 {
			 	 $url_back = $link_data2['url_back'];
			 }
			 
                  if ($url_back!='-'){
						?>
						 <a href="<?php echo $url_back; ?>" class="previous_nav wow fadeInLeft"><i class="fa fa-hand-o-left"></i>Previous Post</a>
              			<?php
							  	
				  }
               ?>
               
               <?php 
                  if ($url_next!='-'){
						?>
						
						<a href="<?php echo $url_next; ?>" class="next_nav wow fadeInRight">Next Post <i class="fa fa-hand-o-right"></i></a>
						
						<?php
							  	
				  }
               ?>

            </div>
            <!-- End single blog navigation -->

            
                     
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- Start blog sidebar -->
            <div class="blog_sidebar">
              
              
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
							 echo "<a href=\"".site_url('blog/category/'.$axt['page_keywordc'])."\"><i class=\"fa fa-tags\"></i>".$axt['page_keywords']."</a>";	
						}
					}
                	
                	?>
                </div>
              </div>
              <!-- End single sidebar -->
              <!-- Start single sidebar -->
              <!--<div class="single_blogsidebar">
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
                   
              <div class="single_blogsidebar">
                <h2>Links</h2>
                <ul>
                  <li><a href="#">Links 1</a></li>
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
    
    <!-- Custom js-->
    <script src="<?php echo site_url('assets/home/js/custom.js');?>"></script>
    
  </body>
</html>