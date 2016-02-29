/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.6.20 : Database - bhs_portal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bhs_portal` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bhs_portal`;

/*Table structure for table `banned` */

DROP TABLE IF EXISTS `banned`;

CREATE TABLE `banned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `banned` */

insert  into `banned`(`id`,`ip`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values (2,'100.10.25.40','2015-05-19 16:37:54','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,0),(3,'91.220.13.30','2015-05-19 16:38:04','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,0);

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ci_sessions` */

/*Table structure for table `content_translations` */

DROP TABLE IF EXISTS `content_translations`;

CREATE TABLE `content_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `language_slug` varchar(5) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_title` varchar(255) DEFAULT NULL,
  `teaser` mediumtext NOT NULL,
  `content` longtext,
  `page_title` varchar(100) DEFAULT NULL,
  `page_description` varchar(170) DEFAULT NULL,
  `page_keywords` varchar(255) DEFAULT NULL,
  `rake` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `content_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `content_translations` */

insert  into `content_translations`(`id`,`content_id`,`language_slug`,`title`,`short_title`,`teaser`,`content`,`page_title`,`page_description`,`page_keywords`,`rake`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`,`content_type`) values (38,25,'id','Blog','Blog','','','Blog','Blog','Blog',0,'2015-12-02 04:37:58',NULL,NULL,1,0,0,NULL),(21,25,'en','Blogs','Blogs','0','','Blog','0','',0,'2015-05-26 13:42:56','2015-05-28 11:13:50',NULL,1,1,0,NULL),(27,31,'en','News','News','','','News','','btx, bhs,',0,'2015-11-23 03:08:58',NULL,NULL,1,0,0,NULL),(28,31,'id','Berita','Berita','','','berita','Berita Terbaru','btx, bhs, berita',0,'2015-11-23 03:12:27',NULL,NULL,1,0,0,NULL),(29,32,'en','SILATURRAHIM ICMI ORWIL JAWA TIMUR KE PT. BEHAESTEX','silaturahmi icmi','&amp;lt;p&amp;gt;Tanggal 1 Juni 2012, Imail Nachu ketua ICMI Orwim Jawa Timur (beberapa anggota yang lain) bersilaturrahim pada Najib Abdurauf Bahasuan SE, (Bendahara ICMI sekaligus dirut utama PT. Behaestex). Dengan menggunakan tiga mobil pribadi rombangan berangkat dari ....','<p>Tanggal 1 Juni 2012, Imail Nachu ketua ICMI Orwim Jawa Timur (beberapa anggota yang lain) bersilaturrahim pada Najib Abdurauf Bahasuan SE, (Bendahara ICMI sekaligus dirut utama PT. Behaestex). Dengan menggunakan tiga mobil pribadi rombangan berangkat dari sekertariat ICMI Orwil Jawa Timur munuju Gersik (PT. BEHAESTEX), untung dalam perjalan tidak ada macet dan sekitar Pukul 13.30 rombangan dari ICMI tiba di PT. Behaestek, dan langsung disambut sendir oleh&nbsp; Najib Abdurauf Bahasuan. fds</p>','SILATURRAHIM ICMI ORWIL JAWA TIMUR KE PT. BEHAESTEX','&amp;lt;p&amp;gt;Tanggal 1 Juni 2012, Imail Nachu ketua ICMI Orwim Jawa Timur (beberapa anggota yang lain) bersilaturrahim pada Najib Abdurauf Bahasuan SE, (Bendahara I&a','',0,'2015-11-23 03:29:46','2015-12-07 03:56:07',NULL,1,1,0,'post'),(30,33,'en','Stand Atlas di acara NU Expo','Stand_atlas_nu','Stand Atlas juga hadir di acara NU Expo di Grand City Surabaya, semua suka sarung AtlaS #Bangga Bersarung Atlas. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo','<p>Stand Atlas juga hadir di acara NU Expo di Grand City Surabaya, semua suka sarung AtlaS #Bangga Bersarung Atlas. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>','Stand Atlas di acara NU Expo','Stand Atlas juga hadir di acara NU Expo di Grand City Surabaya, semua suka sarung AtlaS #Bangga Bersarung Atlas. Sed ut perspiciatis unde omnis iste natus error&hellip;','',0,'2015-11-23 04:52:27','2015-11-23 07:00:21',NULL,1,1,0,NULL),(31,34,'en','Kunjungan siswa Sekolah Alam insan Mulia','Kunjungan siswa Sekolah Alam insan Mulia','Kunjungan siswa Sekolah Alam insan Mulia ke PT Behaestex Gresik untuk mempelajari proses produksi sarung dan belajar entrepreneurship.','<p>Kunjungan siswa Sekolah Alam insan Mulia ke PT Behaestex Gresik untuk mempelajari proses produksi sarung dan belajar entrepreneurship. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>','Kunjungan siswa Sekolah Alam insan Mulia','Kunjungan siswa Sekolah Alam insan Mulia ke PT Behaestex Gresik untuk mempelajari proses produksi sarung dan belajar entrepreneurship.','',0,'2015-11-23 08:16:30','2015-11-23 08:17:52',NULL,1,1,0,NULL),(32,35,'en','Kunjungan Ikatan Alumni Wira Usaha Muda Mandiri','Kunjungan Ikatan Alumni Wira Usaha Muda Mandiri','Kunjungan IKA Wirausaha Muda Mandiri Jawa Timur ke PT. Behaestex untuk menggali inspirasi dari Perusahaan keluarga yang telah mampi menghadapi berbagai macam krisis dan berusia hampir 60 tahun. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo','<p>Kunjungan IKA Wirausaha Muda Mandiri Jawa Timur ke PT. Behaestex untuk menggali inspirasi dari Perusahaan keluarga yang telah mampi menghadapi berbagai macam krisis dan berusia hampir 60 tahun. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>','Kunjungan Ikatan Alumni Wira Usaha Muda Mandiri','Kunjungan IKA Wirausaha Muda Mandiri Jawa Timur ke PT. Behaestex untuk menggali inspirasi dari Perusahaan keluarga yang telah mampi menghadapi berbagai macam kr&hellip;','',0,'2015-11-23 08:18:37','2015-11-23 08:18:46',NULL,1,1,0,NULL),(33,36,'en','Kunjungan Mahasiswa Ciputra University dan AMA Jatim','Kunjungan Mahasiswa Ciputra University dan AMA Jatim','Kunjungan Mahasiswa Ciputra University dan AMA Jatim ke Pabrik PT. Behaestex untuk mengetahui proses produksi sarung dan sistem distribusinya yang unik. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo','<p>Kunjungan Mahasiswa Ciputra University dan AMA Jatim ke Pabrik PT. Behaestex untuk mengetahui proses produksi sarung dan sistem distribusinya yang unik. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>','Kunjungan Mahasiswa Ciputra University dan AMA Jatim','Kunjungan Mahasiswa Ciputra University dan AMA Jatim ke Pabrik PT. Behaestex untuk mengetahui proses produksi sarung dan sistem distribusinya yang unik. Sed ut &hellip;','',0,'2015-11-23 08:20:31','2015-11-23 08:20:48',NULL,1,1,0,NULL),(34,37,'en','Atlas ketika mensponsori Jalan Semangat Hari Pahlawan bersama ESQ 165','Atlas ketika mensponsori Jalan Semangat Hari Pahlawan bersama ESQ 165','','<p>Atlas ketika mensponsori Jalan Semangat Hari Pahlawan bersama ESQ 165 bersama Ary Ginandjar, Menteri Pendidikan M Nuh dan Menteri BUMN Dahlan Iskan, Tampak dalam foto Meneg BUMN sedang bergangnam style.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>','Atlas ketika mensponsori Jalan Semangat Hari Pahlawan bersama ESQ 165','','',0,'2015-11-23 08:22:42','2015-11-23 08:26:29',NULL,1,1,0,NULL),(35,38,'en','Product','Product','','','Product','Product','Product',0,'2015-12-02 02:57:54',NULL,NULL,1,0,0,NULL),(36,38,'id','Produk','Produk','','','Produk','Produk','Produk',0,'2015-12-02 02:58:27',NULL,NULL,1,0,0,NULL),(37,39,'en','Atlas Jaquard','Atlas Jaquard','','<p>Atlas Songket Jacquard adalah jenis songket terbaru dari produk atlas yang memberi warna tersendiri pada industri sarung Indonesia. Atlas songket jacquard memiliki motif jacquard yang tenunnya lebih unggul daripada pancingan. Hal ini dikarenakan tingkat kesulitan dan kerumitan pada pengerjaan tenun dan motif yang benar-benar menghasilkan sebuah corak yang hidup dan lembut.</p>','Atlas Jaquard','Atlas Jaquard','Atlas Jaquard',0,'2015-12-02 03:05:31',NULL,NULL,1,0,0,NULL);

/*Table structure for table `contents` */

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type` varchar(100) NOT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `featured_image` varchar(255) NOT NULL,
  `order` int(4) unsigned NOT NULL,
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `share_fb` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

/*Data for the table `contents` */

insert  into `contents`(`id`,`content_type`,`parent_id`,`featured_image`,`order`,`published`,`published_at`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`,`share_fb`) values (25,'category',0,'',0,1,'2015-12-02 04:37:46','2015-05-26 13:42:55','2015-12-02 04:37:58',NULL,1,1,0,0),(27,'page',0,'',0,0,'2015-06-05 13:53:57','2015-06-05 13:54:19','2015-06-05 13:58:35',NULL,1,1,0,0),(31,'category',0,'',0,1,'2015-11-23 03:11:49','2015-11-23 03:08:58','2015-11-24 04:58:37',NULL,1,1,0,0),(32,'post',31,'',0,1,'2015-11-23 03:12:41','2015-11-23 03:29:46','2015-12-07 03:56:07',NULL,1,1,0,0),(33,'post',0,'',0,1,'2015-11-23 04:51:29','2015-11-23 04:52:27','2015-11-23 07:00:21',NULL,1,1,0,0),(34,'post',0,'',0,1,'2015-11-23 08:16:00','2015-11-23 08:16:30','2016-01-05 07:34:35',NULL,1,2,0,0),(35,'post',0,'',0,1,'2015-11-23 08:18:10','2015-11-23 08:18:37','2015-11-23 08:18:54',NULL,1,1,0,0),(36,'post',0,'',0,1,'2015-11-23 08:20:10','2015-11-23 08:20:31','2015-11-23 08:20:53',NULL,1,1,0,0),(37,'post',0,'',0,1,'2015-11-23 08:22:04','2015-11-23 08:22:42','2015-11-23 08:26:34',NULL,1,1,0,0),(38,'category',0,'',0,1,'2015-12-02 02:58:05','2015-12-02 02:57:54','2015-12-02 02:58:27',NULL,1,1,0,0),(39,'post',38,'',0,1,'2015-12-02 03:03:27','2015-12-02 03:05:31','2015-12-02 03:05:39',NULL,1,1,0,0);

/*Table structure for table `daftar_produk` */

DROP TABLE IF EXISTS `daftar_produk`;

CREATE TABLE `daftar_produk` (
  `id_daftar_produk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_languages` int(11) NOT NULL,
  `judul_produk` varchar(255) DEFAULT NULL,
  `diskripsi_produk` blob,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_daftar_produk`),
  UNIQUE KEY `id_languages` (`id_languages`,`judul_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `daftar_produk` */

insert  into `daftar_produk`(`id_daftar_produk`,`id_languages`,`judul_produk`,`diskripsi_produk`,`gambar`) values (1,8,'Sarong','BHS is a Sarong brand made of the finest silk registered with a certificate SNI No. 08-3440-1996 By using handloom, a fusion between traditional art and technology, BHS silk Sarong.','uploads/sarong_fw.png'),(2,9,'Sarung','BHS adalah merek sarung yang terbuat dari bahan sutera terbaik yang terdaftar dengan sertifikat SNI No. 08-3440-1996 Dengan  menggunakan ATBM, perpaduan antara seni tradisional dan teknologi, sarung sutera BHS.','uploads/sarong_fw1.png'),(3,8,'Bamus','Bamus (Baju Muslim) Atlas created for you a tasteful, made with the best quality yarn, gently worn, comfortable when worn, and that certainly adds kekyusukan your worship.','uploads/bamus_fw.png'),(4,9,'Bamus','Bamus (Baju Muslim) Atlas diciptakan untuk Anda yang berselera tinggi, dibuat dengan benang kualitas terbaik, lembut dipakai, nyaman ketika dikenakan, dan yang pasti menambah kekyusukan ibadah Anda.','uploads/bamus_fw1.png'),(5,8,'Songkok','Songkok ATLAS and BHS brands marketed by a certificate SNI No. 08-4343-1996, has the advantage, among others, from a neat piece and strong tailoring and comfort of life.','uploads/songkok_fw.png'),(6,9,'Songkok','Songkok dengan merek ATLAS dan BHS yang dipasarkan dengan sertifikat SNI No. 08-4343-1996, memiliki keunggulan, antara lain dari potongan yang rapi dan jahitan yang kuat serta kenyamanan pakainya.','uploads/songkok_fw1.png'),(7,8,'Subaiyah','Surban (Long turban) with super thick cotton fabric with a pattern of boxes / lane. with menarik.Sangat color combination is very suitable for prayer, traveling, and can as an alternative for souvenirs Hajj and Umrah.','uploads/subaiyah_fw.jpg'),(8,9,'Subaiyah','Surban panjang dengan kain berbahan katun tebal super dengan motif kotak / lajur. dengan kombinasi warna yang sangat menarik.Sangat cocok dipakai untuk sholat, bepergian, dan bisa sebagai alternatif untuk oleh-oleh ibadah haji dan umrah.','uploads/subaiyah_fw1.jpg');

/*Table structure for table `dictionary` */

DROP TABLE IF EXISTS `dictionary`;

CREATE TABLE `dictionary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `word` varchar(255) NOT NULL,
  `language_slug` varchar(10) NOT NULL,
  `noise` tinyint(1) NOT NULL DEFAULT '0',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM AUTO_INCREMENT=1324 DEFAULT CHARSET=utf8;

/*Data for the table `dictionary` */

insert  into `dictionary`(`id`,`parent_id`,`word`,`language_slug`,`noise`,`verified`) values (660,0,'va','ro',1,1),(661,0,'fi','ro',1,1),(662,0,'din','ro',1,1),(663,0,'si','ro',1,1),(664,0,'in','ro',1,1),(665,0,'la','ro',1,1),(666,0,'a','ro',1,1),(667,0,'sub','ro',1,1),(668,0,'de','ro',1,1),(669,0,'alaturi','ro',1,1),(670,0,'al','ro',1,1),(671,0,'cu','ro',1,1),(672,0,'catre','ro',1,1),(673,0,'cand','ro',1,1),(674,0,'pana','ro',1,1),(675,972,'unor','ro',1,1),(676,0,'le','ro',1,1),(677,0,'care','ro',1,1),(678,0,'pe','ro',1,1),(679,0,'sa','ro',1,1),(680,0,'dupa','ro',1,1),(681,0,'o','ro',1,1),(682,950,'ar','ro',1,1),(683,0,'s','ro',1,1),(684,0,'acest','ro',1,1),(685,1217,'intre','ro',1,1),(686,0,'ca','ro',1,1),(687,0,'ii','ro',1,1),(688,0,'se','ro',1,1),(689,0,'fie','ro',1,1),(690,0,'lui','ro',1,1),(691,957,'eliberata','ro',0,1),(692,966,'plasata','ro',0,1),(693,971,'trimisa','ro',0,1),(694,661,'este','ro',0,1),(695,0,'mai','ro',0,1),(696,975,'acelasi','ro',1,1),(697,967,'potrivit','ro',0,1),(698,0,'pentru','ro',1,1),(699,707,'arestata','ro',0,1),(700,0,'prin','ro',1,1),(701,762,'luat','ro',0,1),(702,707,'arestat','ro',0,1),(703,957,'eliberat','ro',0,1),(704,966,'plasat','ro',0,1),(705,971,'trimis','ro',0,1),(706,773,'penitenciarul','ro',0,1),(707,0,'arest','ro',0,1),(708,945,'domiciliu','ro',0,1),(709,0,'fost','ro',1,1),(710,978,'judecata','ro',0,1),(711,0,'aprilie','ro',0,1),(712,752,'dosarul','ro',0,1),(713,947,'cunoscut','ro',0,1),(714,775,'numele','ro',0,1),(715,0,'gala','ro',0,1),(716,709,'fostul','ro',0,1),(717,747,'ministru','ro',0,1),(718,0,'fata','ro',0,1),(719,756,'instantei','ro',0,1),(720,950,'au','ro',1,1),(721,935,'ajuns','ro',0,1),(722,0,'presedinte','ro',0,1),(723,754,'federatiei','ro',0,1),(724,771,'romane','ro',0,1),(725,0,'box','ro',0,1),(726,940,'consilier','ro',0,1),(727,0,'secretar','ro',0,1),(728,0,'general','ro',0,1),(729,952,'director','ro',0,1),(730,750,'companiei','ro',0,1),(731,1028,'nationale','ro',0,1),(732,977,'investitii','ro',0,1),(733,748,'acuzata','ro',0,1),(734,0,'abuz','ro',0,1),(735,1034,'serviciu','ro',0,1),(736,0,'legatura','ro',0,1),(737,964,'organizarea','ro',0,1),(738,753,'evenimentului','ro',0,1),(739,747,'ministerul','ro',0,1),(740,948,'dezvoltarii','ro',0,1),(741,772,'regionale','ro',0,1),(742,770,'turismului','ro',0,1),(743,0,'respectiv','ro',1,1),(744,762,'luare','ro',0,1),(745,745,'mita','ro',0,1),(746,755,'finantarea','ro',0,1),(747,0,'minister','ro',0,1),(748,748,'acuzat','ro',0,1),(749,950,'avea','ro',1,1),(750,0,'companie','ro',0,1),(751,948,'dezvoltare','ro',0,1),(752,0,'dosar','ro',0,1),(753,0,'eveniment','ro',0,1),(754,0,'federatie','ro',0,1),(755,960,'finantare','ro',0,1),(756,0,'instanta','ro',0,1),(757,977,'investitie','ro',0,1),(758,978,'judeca','ro',0,1),(759,971,'trimite','ro',0,1),(760,967,'potrivi','ro',0,1),(761,966,'plasa','ro',0,1),(762,0,'lua','ro',1,1),(763,977,'investi','ro',0,1),(764,960,'finanta','ro',0,1),(765,957,'elibera','ro',0,1),(766,948,'dezvolta','ro',0,1),(767,947,'cunoaste','ro',0,1),(768,707,'aresta','ro',0,1),(769,934,'acuza','ro',0,1),(770,0,'turism','ro',0,1),(771,0,'roman','ro',0,1),(772,0,'regional','ro',0,1),(773,0,'penitenciar','ro',0,1),(774,964,'organiza','ro',0,1),(775,0,'nume','ro',0,1),(776,1028,'national','ro',0,1),(777,0,'primit','ro',0,1),(778,783,'firmei','ro',0,1),(779,933,'administratorul','ro',0,1),(780,939,'asigura','ro',0,1),(781,0,'plata','ro',0,1),(782,0,'primi','ro',0,1),(783,0,'firma','ro',0,1),(784,933,'administrator','ro',0,1),(785,979,'stat','ro',0,1),(786,707,'arestul','ro',0,1),(787,0,'masura','ro',0,1),(788,0,'inlocuit','ro',0,1),(789,0,'februarie','ro',0,1),(790,968,'preventiv','ro',0,1),(791,942,'cauza','ro',0,1),(792,0,'penal','ro',0,1),(793,973,'urmarita','ro',0,1),(794,814,'banilor','ro',0,1),(795,965,'originea','ro',0,1),(796,949,'disimula','ro',0,1),(797,818,'infractionala','ro',0,1),(798,820,'intocmite','ro',0,1),(799,955,'donatie','ro',0,1),(800,1288,'aparenta','ro',0,1),(801,0,'transferat','ro',0,1),(802,824,'sume','ro',0,1),(803,821,'multe','ro',1,1),(804,661,'fiind','ro',0,1),(805,814,'bani','ro',0,1),(806,970,'spalare','ro',0,1),(807,819,'infractiunea','ro',0,1),(808,954,'cercetarile','ro',0,1),(809,944,'continue','ro',0,1),(810,953,'dispus','ro',0,1),(811,823,'procurorii','ro',0,1),(812,752,'dosarului','ro',0,1),(813,1288,'aparent','ro',1,1),(814,0,'ban','ro',0,1),(815,954,'cercetare','ro',0,1),(816,944,'continuu','ro',0,1),(817,944,'continua','ro',0,1),(818,0,'infractional','ro',0,1),(819,0,'infractiune','ro',0,1),(820,0,'intocmit','ro',0,1),(821,0,'mult','ro',1,1),(822,965,'origine','ro',0,1),(823,0,'procuror','ro',0,1),(824,0,'suma','ro',0,1),(825,973,'urmarit','ro',0,1),(826,971,'trimiterea','ro',0,1),(827,937,'aprobate','ro',0,1),(828,660,'vor','ro',1,1),(829,755,'finantarile','ro',0,1),(830,961,'garantiei','ro',0,1),(831,861,'schimbul','ro',0,1),(832,858,'lucrari','ro',0,1),(833,854,'contractele','ro',0,1),(834,956,'efectuate','ro',0,1),(835,781,'platile','ro',0,1),(836,859,'materiale','ro',0,1),(837,856,'foloase','ro',0,1),(838,976,'afaceri','ro',0,1),(839,860,'omul','ro',0,1),(840,0,'cerut','ro',0,1),(841,862,'totala','ro',0,1),(842,988,'valoare','ro',0,1),(843,951,'bancare','ro',0,1),(844,863,'transferuri','ro',0,1),(845,0,'patru','ro',0,1),(846,969,'realizat','ro',0,1),(847,0,'fel','ro',0,1),(848,974,'vrea','ro',0,1),(865,821,'multor','ro',0,1),(851,976,'afacere','ro',0,1),(852,937,'aprobat','ro',0,1),(853,951,'bancar','ro',0,1),(854,0,'contract','ro',0,1),(855,956,'efectuat','ro',0,1),(856,0,'folos','ro',0,1),(857,961,'garantie','ro',0,1),(858,0,'lucrare','ro',0,1),(859,0,'material','ro',0,1),(860,0,'om','ro',0,1),(861,0,'schimb','ro',0,1),(862,0,'total','ro',0,1),(863,0,'transfer','ro',0,1),(864,971,'trimitere','ro',0,1),(866,938,'aproximativ','ro',1,1),(867,898,'lei','ro',0,1),(868,0,'timp','ro',0,1),(869,858,'lucrarilor','ro',0,1),(870,958,'executate','ro',0,1),(871,900,'societatea','ro',0,1),(872,963,'mentionata','ro',0,1),(873,1043,'baza','ro',0,1),(874,854,'contractelor','ro',0,1),(875,962,'incheiate','ro',0,1),(876,936,'anchetatorii','ro',0,1),(877,0,'stabilit','ro',0,1),(878,892,'dadea','ro',0,1),(879,814,'banii','ro',0,1),(880,777,'primiti','ro',0,1),(881,959,'faceau','ro',1,1),(882,0,'numerar','ro',0,1),(883,897,'intermediul','ro',0,1),(884,900,'societatii','ro',0,1),(885,933,'administrata','ro',0,1),(886,890,'altor','ro',0,1),(887,895,'fictive','ro',0,1),(888,946,'consultanta','ro',0,1),(932,933,'administrat','ro',0,1),(890,0,'alt','ro',0,1),(891,936,'anchetator','ro',0,1),(892,0,'da','ro',0,1),(893,958,'executat','ro',0,1),(894,959,'face','ro',1,1),(895,0,'fictiv','ro',0,1),(896,962,'incheiat','ro',0,1),(897,0,'intermediu','ro',0,1),(898,0,'leu','ro',0,1),(899,963,'mentionat','ro',0,1),(900,0,'societate','ro',0,1),(901,0,'elena','ro',0,1),(902,0,'udrea','ro',0,1),(903,0,'targsor','ro',0,1),(904,0,'bute','ro',0,1),(905,0,'ion','ro',0,1),(906,0,'ariton','ro',0,1),(907,0,'rudel','ro',0,1),(908,0,'obreja','ro',0,1),(909,0,'tudor','ro',0,1),(910,0,'breazu','ro',0,1),(911,901,'elenei','ro',0,1),(912,0,'stefan','ro',0,1),(913,0,'lungu','ro',0,1),(914,0,'mdrt','ro',0,1),(915,0,'nastasia','ro',0,1),(916,0,'ana','ro',0,1),(917,0,'maria','ro',0,1),(918,0,'gheorghe','ro',0,1),(919,0,'topoliceanu','ro',0,1),(920,0,'dragos','ro',0,1),(921,0,'botoroaga','ro',0,1),(922,854,'contracte','ro',0,1),(923,0,'dna','ro',0,1),(924,0,'srl','ro',1,1),(925,0,'adrian','ro',0,1),(926,0,'gardean','ro',0,1),(927,0,'sc','ro',1,1),(928,0,'bucuresti','ro',0,1),(929,0,'pdl','ro',0,1),(930,0,'microsoft','ro',0,1),(931,950,'are','ro',1,1),(933,0,'administr','ro',0,1),(934,0,'acuz','ro',0,1),(935,0,'ajun','ro',0,1),(936,0,'anchet','ro',0,1),(937,0,'aprob','ro',0,1),(938,0,'proxim','ro',0,1),(939,0,'sigur','ro',0,1),(940,0,'consili','ro',0,1),(941,938,'aproxima','ro',0,1),(942,0,'cauz','ro',0,1),(943,955,'dona','ro',0,1),(944,0,'continu','ro',0,1),(945,0,'domicil','ro',0,1),(946,0,'consult','ro',0,1),(947,0,'cunosc','ro',0,1),(948,0,'dezvolt','ro',0,1),(949,0,'simul','ro',0,1),(950,0,'ave','ro',0,1),(951,0,'banca','ro',0,1),(952,0,'direct','ro',0,1),(953,0,'dispu','ro',0,1),(954,0,'cercet','ro',0,1),(955,0,'don','ro',0,1),(956,0,'efect','ro',0,1),(957,0,'eliber','ro',0,1),(958,0,'execut','ro',0,1),(959,0,'fac','ro',0,1),(960,0,'finant','ro',0,1),(961,0,'garant','ro',0,1),(962,0,'inchei','ro',0,1),(963,0,'mention','ro',0,1),(964,0,'organiz','ro',0,1),(965,0,'origin','ro',0,1),(966,0,'plas','ro',0,1),(967,0,'potriv','ro',0,1),(968,0,'preven','ro',0,1),(969,0,'realiz','ro',0,1),(970,0,'spal','ro',0,1),(971,0,'trimi','ro',0,1),(972,0,'un','ro',0,1),(973,0,'urmar','ro',0,1),(974,0,'vre','ro',0,1),(975,0,'acela','ro',0,1),(976,0,'afacer','ro',0,1),(977,0,'invest','ro',0,1),(978,0,'judec','ro',0,1),(979,0,'sta','ro',0,1),(980,0,'consmin','ro',0,1),(981,0,'cni','ro',0,1),(982,0,'ekaton','ro',0,1),(983,0,'consulting','ro',0,1),(984,0,'termogaz','ro',0,1),(985,0,'company','ro',0,1),(986,0,'kranz','ro',0,1),(987,0,'eurocenter','ro',0,1),(988,0,'valor','ro',0,1),(990,0,'test','ro',0,1),(991,990,'testarea','ro',0,1),(992,0,'be','en',0,1),(993,992,'being','en',0,1),(994,0,'despre','ro',1,1),(995,0,'noi','ro',1,1),(996,0,'uti','ro',0,1),(997,1028,'nationala','ro',0,1),(998,1027,'inalta','ro',0,1),(999,1038,'tehnologie','ro',0,1),(1000,1031,'ofera','ro',0,1),(1001,1035,'solutii','ro',0,1),(1002,1030,'novatoare','ro',0,1),(1003,0,'partener','ro',0,1),(1004,1036,'strategic','ro',0,1),(1005,1031,'oferind','ro',0,1),(1006,1021,'clientilor','ro',0,1),(1007,1033,'sai','ro',1,1),(1008,0,'dintr','ro',1,1),(1009,1037,'sursa','ro',0,1),(1010,1040,'unica','ro',0,1),(1011,0,'larg','ro',0,1),(1012,1032,'portofoliu','ro',0,1),(1013,1034,'servicii','ro',0,1),(1014,1023,'cuprinde','ro',0,1),(1015,1039,'toate','ro',0,1),(1016,1025,'etapele','ro',0,1),(1017,1029,'necesare','ro',0,1),(1018,1022,'conceptia','ro',0,1),(1019,1026,'implementarea','ro',0,1),(1026,0,'implement','ro',0,1),(1021,0,'client','ro',0,1),(1022,0,'concep','ro',0,1),(1023,0,'cuprin','ro',0,1),(1024,1025,'etapa','ro',0,1),(1025,0,'etap','ro',0,1),(1027,0,'inalt','ro',0,1),(1028,0,'nation','ro',0,1),(1029,0,'necesar','ro',0,1),(1030,0,'nou','ro',0,1),(1031,0,'ofer','ro',0,1),(1032,0,'portofoli','ro',0,1),(1033,0,'sau','ro',0,1),(1034,0,'servici','ro',0,1),(1035,0,'soluti','ro',0,1),(1036,0,'strateg','ro',0,1),(1037,0,'surs','ro',0,1),(1038,0,'tehnolog','ro',0,1),(1039,0,'tot','ro',0,1),(1040,0,'unic','ro',0,1),(1041,1042,'exploatarea','ro',0,1),(1042,0,'exploat','ro',0,1),(1043,0,'baz','ro',0,1),(1044,0,'about','en',1,1),(1045,0,'us','en',1,1),(1046,0,'uti','en',0,1),(1047,1053,'company','en',0,1),(1048,0,'a','en',1,1),(1050,0,'s-ar','ro',1,1),(1051,0,'le-a','ro',1,1),(1052,992,'it\'s','en',1,1),(1053,0,'compan','en',0,1),(1054,992,'is','en',0,1),(1055,684,'aceasta','ro',1,1),(1056,1077,'prima','ro',0,1),(1057,1074,'mea','ro',0,1),(1058,1076,'postare','ro',0,1),(1059,990,'testare','ro',0,1),(1060,0,'asadar','ro',1,1),(1061,1075,'poate','ro',0,1),(1062,990,'testez','ro',0,1),(1063,1073,'iti','ro',1,1),(1064,1078,'vine','ro',0,1),(1065,1072,'crezi','ro',0,1),(1066,0,'nu','ro',1,1),(1295,0,'edit','ro',0,1),(1068,0,'ce','ro',1,1),(1069,1079,'zici','ro',0,1),(1070,1071,'asta','ro',1,1),(1071,0,'ast','ro',1,1),(1072,0,'cred','ro',0,1),(1073,1073,'tu','ro',1,1),(1074,0,'me','ro',1,1),(1075,0,'pot','ro',0,1),(1076,0,'post','ro',0,1),(1077,0,'prim','ro',0,1),(1078,0,'vin','ro',0,1),(1079,0,'zic','ro',0,1),(1080,1082,'putine','ro',0,1),(1081,1083,'mijloace','ro',0,1),(1082,0,'putin','ro',0,1),(1083,0,'mijloc','ro',0,1),(1084,0,'transport','ro',0,1),(1085,1084,'transportului','ro',0,1),(1086,1110,'sindicat','ro',0,1),(1087,0,'ratb','ro',0,1),(1088,1118,'calatorii','ro',0,1),(1089,1114,'informati','ro',0,1),(1090,1236,'luni','ro',0,1),(1091,1113,'posibila','ro',0,1),(1092,1109,'suspendarea','ro',0,1),(1093,0,'comun','ro',0,1),(1094,1110,'sindicatele','ro',0,1),(1095,1111,'regia','ro',0,1),(1096,1119,'autonoma','ro',0,1),(1097,1120,'arata','ro',0,1),(1098,0,'vineri','ro',0,1),(1100,1116,'comunicat','ro',0,1),(1101,1112,'presa','ro',0,1),(1102,1083,'mijloacele','ro',0,1),(1103,1115,'iesi','ro',0,1),(1104,1108,'traseu','ro',0,1),(1105,1075,'putea','ro',0,1),(1106,1117,'citi','ro',0,1),(1107,1107,'mesaj','ro',0,1),(1108,0,'tras','ro',0,1),(1109,0,'suspend','ro',0,1),(1110,0,'sindica','ro',0,1),(1111,0,'regi','ro',0,1),(1112,0,'pres','ro',0,1),(1113,0,'posibil','ro',0,1),(1114,0,'inform','ro',0,1),(1115,0,'ies','ro',0,1),(1116,0,'comunic','ro',0,1),(1117,0,'cit','ro',0,1),(1118,0,'calator','ro',0,1),(1119,0,'autonom','ro',0,1),(1120,0,'arat','ro',0,1),(1121,1122,'capitalei','ro',0,1),(1122,0,'capital','ro',0,1),(1123,0,'razboi','ro',0,1),(1124,1233,'mondial','ro',0,1),(1125,0,'bismarck','ro',0,1),(1126,1128,'cuirasatului','ro',0,1),(1127,1128,'cuirasatul','ro',0,1),(1128,0,'cuirasat','ro',0,1),(1129,1242,'epopeea','ro',0,1),(1130,1242,'epopee','ro',0,1),(1131,1068,'ce-i','ro',1,1),(1242,0,'epope','ro',0,1),(1134,1137,'istoria','ro',0,1),(1135,1137,'istorie','ro',0,1),(1136,1137,'istoricul','ro',0,1),(1137,0,'istori','ro',0,1),(1138,0,'triumf','ro',0,1),(1139,1142,'tragedie','ro',0,1),(1140,1144,'lupta','ro',0,1),(1141,1143,'scufundarea','ro',0,1),(1142,0,'tragedi','ro',0,1),(1143,0,'scufund','ro',0,1),(1144,0,'lupt','ro',0,1),(1145,0,'moderata','ro',0,1),(1146,1168,'reprezinta','ro',0,1),(1147,0,'manuel','ro',0,1),(1148,0,'stanescu','ro',0,1),(1149,1160,'pagina','ro',0,1),(1150,1150,'aparte','ro',1,1),(1151,1167,'bataliilor','ro',0,1),(1152,1161,'navale','ro',0,1),(1153,1166,'celui','ro',0,1),(1154,1165,'doilea','ro',0,1),(1155,1162,'marcand','ro',0,1),(1156,1163,'inceputul','ro',0,1),(1157,1159,'sfarsitului','ro',0,1),(1158,1164,'iluzii','ro',0,1),(1159,0,'sfars','ro',0,1),(1160,0,'pagin','ro',0,1),(1161,0,'nav','ro',0,1),(1162,0,'marc','ro',0,1),(1163,0,'incep','ro',0,1),(1164,0,'iluzi','ro',0,1),(1165,0,'doi','ro',0,1),(1166,0,'cel','ro',0,1),(1167,0,'bat','ro',0,1),(1168,0,'reprez','ro',0,1),(1169,670,'ale','ro',1,1),(1170,0,'totodata','ro',1,1),(1171,1189,'renasterea','ro',0,1),(1172,1187,'sperantei','ro',0,1),(1173,1185,'supusii','ro',0,1),(1174,1193,'imperiului','ro',0,1),(1175,1196,'britanic','ro',0,1),(1176,1195,'clipa','ro',0,1),(1177,1191,'mandrie','ro',0,1),(1178,1190,'orgoliu','ro',0,1),(1179,1188,'satisfacut','ro',0,1),(1180,1192,'inteleasa','ro',0,1),(1181,0,'semn','ro',0,1),(1182,1194,'esecului','ro',0,1),(1183,1167,'batalia','ro',0,1),(1184,1186,'suprematie','ro',0,1),(1185,0,'supun','ro',0,1),(1186,0,'suprem','ro',0,1),(1187,0,'sper','ro',0,1),(1188,0,'satisfa','ro',0,1),(1189,0,'nasc','ro',0,1),(1190,0,'orgoli','ro',0,1),(1191,0,'mandr','ro',0,1),(1192,0,'inteleg','ro',0,1),(1193,0,'imperi','ro',0,1),(1194,0,'esec','ro',0,1),(1195,0,'clip','ro',0,1),(1196,0,'britan','ro',0,1),(1197,1198,'blogs','ro',0,1),(1198,0,'blog','ro',0,1),(1199,0,'ora','ro',0,1),(1200,1232,'nazist','ro',0,1),(1201,1233,'mondiala','ro',0,1),(1202,1240,'conditiile','ro',0,1),(1203,0,'peste','ro',0,1),(1204,1236,'luna','ro',0,1),(1205,1163,'incepea','ro',0,1),(1206,1234,'marea','ro',0,1),(1207,1167,'batalie','ro',0,1),(1208,0,'est','ro',0,1),(1209,1229,'politica','ro',0,1),(1210,1237,'inmormanta','ro',0,1),(1211,821,'multa','ro',0,1),(1212,0,'vreme','ro',0,1),(1213,0,'iar','ro',1,1),(1214,1228,'purta','ro',0,1),(1215,1230,'pierea','ro',0,1),(1216,0,'i','ro',1,1),(1217,0,'intr','ro',1,1),(1218,1238,'glorie','ro',0,1),(1219,1239,'efemera','ro',0,1),(1220,0,'insa','ro',1,1),(1221,1231,'neuitat','ro',0,1),(1222,1241,'batranii','ro',0,1),(1223,1235,'lupi','ro',0,1),(1224,670,'ai','ro',1,1),(1225,1234,'marilor','ro',0,1),(1226,1227,'subiectele','ro',0,1),(1227,0,'subiect','ro',0,1),(1228,0,'port','ro',0,1),(1229,0,'politic','ro',0,1),(1230,0,'pier','ro',0,1),(1231,0,'uit','ro',0,1),(1232,0,'nazi','ro',0,1),(1233,0,'mond','ro',0,1),(1234,0,'mare','ro',0,1),(1235,0,'lup','ro',0,1),(1236,0,'lun','ro',0,1),(1237,0,'mormant','ro',0,1),(1238,0,'glor','ro',0,1),(1239,0,'efemer','ro',0,1),(1240,0,'conditi','ro',0,1),(1241,0,'batran','ro',0,1),(1243,1311,'valuri','ro',0,1),(1244,1310,'ului','ro',1,1),(1245,1305,'referitoare','ro',0,1),(1246,0,'raman','ro',0,1),(1247,1301,'populare','ro',0,1),(1248,1304,'randul','ro',0,1),(1249,1303,'publicului','ro',0,1),(1250,771,'romania','ro',0,1),(1251,1288,'aparitia','ro',0,1),(1252,1282,'unei','ro',1,1),(1253,1293,'dedicata','ro',0,1),(1254,1296,'exclusiv','ro',0,1),(1255,1255,'demers','ro',0,1),(1256,1161,'navala','ro',0,1),(1257,1217,'dintre','ro',1,1),(1258,1166,'cele','ro',1,1),(1259,1291,'bune','ro',0,1),(1260,1292,'carti','ro',0,1),(1261,1293,'dedicate','ro',0,1),(1262,0,'apa','ro',0,1),(1263,1298,'impactul','ro',0,1),(1264,1242,'epopeii','ro',0,1),(1265,1300,'planuri','ro',0,1),(1266,1299,'lansarii','ro',0,1),(1267,890,'altele','ro',1,1),(1268,1308,'speciala','ro',0,1),(1269,1294,'dezbaterilor','ro',0,1),(1270,1295,'editie','ro',0,1),(1271,0,'m','ro',1,1),(1272,1309,'transmisa','ro',0,1),(1273,1295,'editor','ro',0,1),(1274,972,'unui','ro',1,1),(1275,1275,'episod','ro',0,1),(1276,0,'destul','ro',1,1),(1277,1279,'riscant','ro',0,1),(1278,1290,'asumat','ro',0,1),(1279,0,'risc','ro',0,1),(1280,1306,'reusit','ro',0,1),(1281,1307,'scrie','ro',0,1),(1282,1282,'una','ro',1,1),(1283,1161,'nava','ro',0,1),(1284,1302,'povestea','ro',0,1),(1285,0,'ei','ro',0,1),(1286,1297,'fascineze','ro',0,1),(1287,1289,'astazi','ro',0,1),(1288,0,'apar','ro',0,1),(1289,0,'zi','ro',0,1),(1290,0,'asum','ro',0,1),(1291,0,'bun','ro',0,1),(1292,0,'cart','ro',0,1),(1293,0,'dedic','ro',0,1),(1294,0,'dezbat','ro',0,1),(1296,0,'exclu','ro',0,1),(1297,0,'fascin','ro',0,1),(1298,0,'impact','ro',0,1),(1299,0,'lans','ro',0,1),(1300,0,'plan','ro',0,1),(1301,0,'popul','ro',0,1),(1302,0,'povest','ro',0,1),(1303,0,'public','ro',0,1),(1304,0,'rand','ro',0,1),(1305,0,'refer','ro',0,1),(1306,0,'reus','ro',0,1),(1307,0,'scri','ro',0,1),(1308,0,'special','ro',0,1),(1309,0,'transmi','ro',0,1),(1310,0,'ul','ro',1,1),(1311,0,'val','ro',0,1),(1312,1292,'cartii','ro',0,1),(1313,1318,'autorul','ro',0,1),(1314,1321,'raspuns','ro',0,1),(1315,0,'dar','ro',1,1),(1316,1319,'intrebari','ro',0,1),(1317,1320,'iubitorii','ro',0,1),(1318,0,'autor','ro',0,1),(1319,0,'intreb','ro',0,1),(1320,0,'iub','ro',0,1),(1321,0,'raspun','ro',0,1),(1322,1163,'incepand','ro',0,1),(1323,684,'aceste','ro',1,1);

/*Table structure for table `event_calendar` */

DROP TABLE IF EXISTS `event_calendar`;

CREATE TABLE `event_calendar` (
  `id_event_cal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_event` date NOT NULL,
  `nama_event` blob NOT NULL,
  `jenis_event` enum('EVENT PERUSAHAAN','LIBUR NASIONAL','CUTI BERSAMA','ULTAH PERUSAHAAN') DEFAULT NULL,
  PRIMARY KEY (`id_event_cal`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `event_calendar` */

insert  into `event_calendar`(`id_event_cal`,`tgl_event`,`nama_event`,`jenis_event`) values (5,'2015-12-25','Libur Hari Natal','LIBUR NASIONAL'),(6,'2015-12-09','Libur Pemilukada Serentak','LIBUR NASIONAL'),(7,'2015-12-24','Libur Maulid Nabi Muhammad SAW','LIBUR NASIONAL'),(13,'2016-01-01','Tahun Baru 2016','LIBUR NASIONAL'),(14,'2016-02-08','Tahun Baru Imlek 2567','LIBUR NASIONAL'),(15,'2016-03-09','Hari Raya Nyepi 1938','LIBUR NASIONAL'),(16,'2016-03-25','Wafat Yesus Kristus','LIBUR NASIONAL'),(17,'2016-05-01','Hari Buruh Nasional','LIBUR NASIONAL'),(18,'2016-05-05','Kenaikan Yesus Kristus','LIBUR NASIONAL'),(19,'2016-05-06','Isra Mi&#039;raj Nabi Muhammad SAW','LIBUR NASIONAL'),(20,'2016-05-22','Hari Raya Waisak 2560','LIBUR NASIONAL');

/*Table structure for table `galeri_produk` */

DROP TABLE IF EXISTS `galeri_produk`;

CREATE TABLE `galeri_produk` (
  `id_galeri` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` blob NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `galeri_produk` */

insert  into `galeri_produk`(`id_galeri`,`title`,`description`) values (1,'Atlas Jaquard Classic 1 Songket','Atlas Songket Jacquard adalah jenis songket terbaru dari produk atlas yang memberi warna tersendiri pada industri sarung Indonesia. Atlas songket jacquard memiliki motif jacquard yang tenunnya lebih unggul daripada pancingan. Hal ini dikarenakan tingkat kesulitan dan kerumitan pada pengerjaan tenun dan motif yang benar-benar menghasilkan sebuah corak yang hidup dan lembut.'),(2,'Super 980 Pancingan','Sarung Atlas Super 980 Pancingan sangat mewah kesannya, lembut sentuhannya dan unik motifnya. Berbekal 7500 benang, sarung Atlas Super 980 Pancingan begitu halus dan solid tenunnya.'),(3,'Super 970 Songket','Di Sarung Atlas Super 970 Songket ini Anda akan mendapatkan banyak variasi songket yang tertanam di kain tenunnya. Di antaranya ada motif songket star, gunungan, kembangan, dll. Bukan hanya itu sarung Atlas Super 970 Songket ini sudah mengadopsi sarung berkualitas nomer satu berkat 7500 benang yang tersemat di dalamnya sehingga mengesankan kelembutan dan kenyamanan.'),(4,'Super 960 Dobby','Sarung Atlas Super 960 Dobby hadir dengan nuansa khas arab, corak bugis dan minang.sarung Atlas Super 960 Dobby sangat unik dengan motif dobby yang melintas di setiap sisi kain sarung.'),(5,'Super 950 Original','Sarung Atlas Super 950 Original adalah sarung Atlas dengan 7500 benang yang sangat khas dengan kelembutan dan kenyamanan. jika Anda menginginkan sarung motif kotak-kotak dengan kualitas benang nomer satu jangan sungkan Anda memilih sarung Atlas Super 950 Original. Dijamin puas.'),(6,'Premium 790 Songket Spesial','Sarung Atlas Premium 790 Songket Spesial memiliki 5500 benang yang mengesankan kelembutan dan kenyamanan. Meski memiliki kesamaan dengan sarung Atlas Premium 770 Songket di sisi benang dan motif songket, namun sarung Atlas Premium 790 Songket Spesial ini memiliki kelebihan dibanding saudaranya yaitu corak atau motif sarung yang lebih unik dan dinamis. Misal, motif gerimis dan motif gunungan.'),(7,'Premium 770 Songket','Sarung tenun Atlas Premium 770 memilih motif songket untuk coraknya, sangat khas. Motifnya sangat unik dan menarik. Perpaduan warnanya terlihat sangat pas. Untuk Anda yang suka dengan corak yang unik dan elegant sarung atlas premium 770 songket merupakan '),(8,'Premium 750 Original','Sarung Atlas Premium 750 merupakan salah satu varian kualitas premium dari “Sarung Atlas”. Memiliki motif yang menarik dan aneka warna pilihan. ditambah dengan kualitas bahan yang bagus dengan kerapatan benang 5500 serta kemasannya yang terlihat elegant d'),(9,'Premium Serat Kayu 795','Sarung Atlas Premium Serat Kayu 795 merupakan salah satu varian kualitas premium dari “Sarung Atlas”. Begitu melihat kemasannya yang sangat menarik dan elegant dan memiliki magnet di salah satu bagiannya Anda tentu menyadari bahwa ini adalah sarung kualit'),(10,'Premium Motif Kembang','Kesan yang didapat dari sarung Atlas Motif Kembang adalah kain halus, tenun solid dan elegant.'),(11,'Atlas Universal 650','Sarung Atlas Universal 650 merupakan salah satu jenis dari “Sarung Atlas”. Memiliki aneka warna disertai dengan motif kotak-kotak yang menarik ditambah dengan kualitas bahan yang bagus dengan kerapatan benang 5000 dan kemasannya yang unik.'),(12,'Atlas 550','Sarung Atlas 550 yang dulunya disebut dengan sarung Atlas Idola 550. Sarung berkualitas dengan jaminan benang 4750 yang tersemat di dalamnya. sarung Atlas 550 lebih solid tenunnya dan halus. Cocok buat bingkisan hajatan dengan harga yang bersahabat.'),(13,'Idaman 525','Memiliki aneka warna disertai dengan motif yang menarik. Memiliki kerapatan benang 4500 benang dan kemasan yang cantik..'),(14,'Favorit 500','Seperti namanya, sarung ini merupakan salah satu jenis yang banyak dicari karena harganya yang terjangkau namun telah membawa nama besar sarung atlas yang telah dipercaya masyarakat kualitasnya. Memiliki aneka warna disertai dengan motif yang menarik. Mem'),(15,'Junior Songket','Sarung Atlas Junior Songket hadir di depan Anda sebagai sarung anak yang bermotif songket timbul. Sehingga sarung anak tidak selalu monoton motif kotak-kotak atau polosan sebagaimana umumnya di pasaran. Sarung Atlas Junior Songket sangat elegant dengan pa'),(16,'Junior','Sarung Atlas Junior adalah sarung yang dibuat untuk anak-anak umur 6-12 tahun. Memiliki bahan katun yang lembut, sehingga nyaman bagi anak-anak. Sarung Atlas Junior adalah pilihan tepat untuk menemani ibadah sholat buah hati anda.');

/*Table structure for table `gambar_produk` */

DROP TABLE IF EXISTS `gambar_produk`;

CREATE TABLE `gambar_produk` (
  `id_gambar_produk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `id_galeri_produk` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_gambar_produk`),
  KEY `gambar_produk_ibfk_1` (`id_galeri_produk`),
  CONSTRAINT `gambar_produk_ibfk_1` FOREIGN KEY (`id_galeri_produk`) REFERENCES `galeri_produk` (`id_galeri`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `gambar_produk` */

insert  into `gambar_produk`(`id_gambar_produk`,`file`,`id_galeri_produk`) values (1,'uploads/produk_11.jpg',1),(2,'uploads/produk_12.jpg',1),(3,'uploads/produk_2.jpg',2),(4,'uploads/produk_3.jpg',3),(5,'uploads/produk_4.jpg',4),(6,'uploads/produk_5.jpg',5),(7,'uploads/produk_6.jpg',6),(8,'uploads/produk_7.jpg',7),(9,'uploads/produk_8.jpg',8),(10,'uploads/produk_9.jpg',9),(11,'uploads/produk_10.jpg',10),(12,'uploads/produk_111.jpg',11),(13,'uploads/produk_121.jpg',12),(14,'uploads/produk_14.jpg',13),(15,'uploads/produk_141.jpg',14),(16,'uploads/produk_15.jpg',15),(17,'uploads/produk_16.jpg',16);

/*Table structure for table `gps` */

DROP TABLE IF EXISTS `gps`;

CREATE TABLE `gps` (
  `id` varchar(255) NOT NULL,
  `nomer_seri` varchar(255) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gps` */

insert  into `gps`(`id`,`nomer_seri`,`tanggal_pembelian`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values ('0561721ce4be3918e4c277a0c14ab88d','AGU-GPS-7Y761','2016-02-29','2016-02-29 11:23:56','2016-02-29 19:20:51',NULL,NULL,NULL,NULL),('12221cba521fcdc9b3ca9f1f9f44ac54','AGU-GPS-A1209','2016-02-29','2016-02-29 11:23:40','2016-02-29 19:21:05',NULL,NULL,NULL,NULL),('40edec9edce62fb346f2f88b6c0baa44','AGU-GPS-4567X','2016-02-29','2016-02-29 20:03:43',NULL,NULL,NULL,NULL,NULL),('7583452a5c40f61c8c96046e1d189af5','AGU-GPS-10976','2016-02-29','2016-02-29 14:18:53','2016-02-29 19:20:36',NULL,NULL,NULL,NULL),('7b36764e74cc6b8bf496ce3423c6aec3','AGU-GPS-12345','2016-02-29','2016-02-29 14:46:16','2016-02-29 19:20:08',NULL,NULL,NULL,NULL),('7dcb3986f2a23f4d8ceb475bb20a828c','AGU-GPS-90871','2016-02-29','2016-02-29 14:46:08','2016-02-29 19:20:24',NULL,NULL,NULL,NULL);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values (1,'admin','Administrators'),(2,'members','Members');

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type` varchar(100) NOT NULL,
  `content_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `width` int(5) NOT NULL DEFAULT '0',
  `height` int(5) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `images` */

insert  into `images`(`id`,`content_type`,`content_id`,`title`,`file`,`width`,`height`,`created_at`,`deleted_at`,`created_by`,`deleted_by`,`updated_at`,`updated_by`) values (3,'',33,'Stand Atlas juga hadir di acara NU Expo','aaa12.jpg',960,720,'2015-11-23 08:13:34',NULL,1,0,NULL,NULL),(4,'',32,'Icmi','aaa13.JPG',320,213,'2015-11-23 08:14:57',NULL,1,0,NULL,NULL),(5,'',34,'Kunjungan siswa Sekolah Alam insan Mulia','kunjungan-siswa-sekolah-alam-insan-mulia.jpg',960,539,'2015-11-23 08:17:10',NULL,1,0,NULL,NULL),(6,'',35,'Kunjungan Ikatan Alumni Wira Usaha Muda Mandiri','kunjungan-ikatan-alumni-wira-usaha-muda-mandiri.jpg',960,539,'2015-11-23 08:19:32',NULL,1,0,NULL,NULL),(7,'',36,'Kunjungan Mahasiswa Ciputra University dan AMA Jatim','kunjungan-mahasiswa-ciputra-university-dan-ama-jatim.jpg',960,539,'2015-11-23 08:21:16',NULL,1,0,NULL,NULL),(8,'',37,'Atlas ketika mensponsori Jalan Semangat Hari Pahlawan bersama ESQ 165','atlas-ketika-mensponsori-jalan-semangat-hari-pahlawan-bersama-esq-165.jpg',960,539,'2015-11-23 08:23:03',NULL,1,0,NULL,NULL),(9,'',39,'Jaquard','jaquard_gb.jpg',550,350,'2015-12-02 03:06:17',NULL,1,0,NULL,NULL),(10,'',40,'Belom Gajian','belom-gajian.jpg',612,612,'2015-12-02 05:06:38',NULL,2,0,NULL,NULL);

/*Table structure for table `keyphrases` */

DROP TABLE IF EXISTS `keyphrases`;

CREATE TABLE `keyphrases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type` varchar(100) NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  `phrase_id` int(10) unsigned NOT NULL,
  `language_slug` varchar(10) NOT NULL,
  `score` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `keyphrases` */

/*Table structure for table `keywords` */

DROP TABLE IF EXISTS `keywords`;

CREATE TABLE `keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type` varchar(255) NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  `language_slug` varchar(10) NOT NULL,
  `word_id` int(10) unsigned NOT NULL,
  `appearances` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `keywords` */

/*Table structure for table `klien` */

DROP TABLE IF EXISTS `klien`;

CREATE TABLE `klien` (
  `no_pendaftaran` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jenis` enum('Perusahaan','Pribadi') DEFAULT NULL,
  `no_siup` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `klien` */

insert  into `klien`(`no_pendaftaran`,`tanggal`,`nama`,`alamat`,`no_telp`,`no_hp`,`email`,`jenis`,`no_siup`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values ('11/daftar/II/2016','2016-02-26','sdsfs','kjlhkljhlkjh','03188888888','08100000000','abc@test.com','Perusahaan','sadas213213azsdasd','2016-02-26 15:37:50',NULL,NULL,NULL,NULL,NULL),('11cc/daftar/II/2016','2016-02-29','ddsfdsvxc v','xcxc','324234','234324324324','abc@test.com','Pribadi','sadas213213azsdasd','2016-02-29 10:49:28',NULL,NULL,NULL,NULL,NULL),('23090e7c13a6a32f3816c1a8d40186fc','2016-02-29','dfdsfsdfsdfvcxv','dsfdsfsdfds','324983209458302','21321321','dsf@dd.hg','Perusahaan','sadas213213azsdasd','2016-02-29 11:30:37',NULL,NULL,NULL,NULL,NULL),('25fd89ddc88e69b05073fae977f3c63b','2016-02-29','sadasdsadasdsad','sadsadsa','324234324','32423423','324dfs@dsd.nm','Perusahaan','324324324','2016-02-29 11:28:07',NULL,NULL,NULL,NULL,NULL),('4277881fe0bd4c1ded0c7f5738ccb1d4','2016-02-29','dsfcxv','cxvxc','34324324324','21321321','abc@test.com','Pribadi','sadsadsadsad','2016-02-29 11:33:19',NULL,NULL,NULL,NULL,NULL),('543fdgdfgdf','2016-02-26','Hallo bandung','rewtgfsdfgfdg','324983209458302','21321321232323','abc@test.com','Pribadi','sadas213213azsdasd','2016-02-26 16:39:47','2016-02-26 16:56:34',NULL,NULL,NULL,NULL),('543fdgdfgdf cxcxcxc','2016-02-29','Hallo bandung','dsfdsfsd','32423432','234324','324dfs@dsd.nm','Pribadi','sadas213213azsdasd','2016-02-29 10:47:45',NULL,NULL,NULL,NULL,NULL),('5aefe460acc33ee2e5c680a8c86ddd27','2016-02-29','dfg fdgedfrgtret','retfdgfdgdfg','10121212','21321321','dsf@dd.hg','Pribadi','sadsadsadsad','2016-02-29 11:33:47',NULL,NULL,NULL,NULL,NULL),('9c0c09be97554f7ee27b2047f4487d1c','2016-02-29','dsgf','sdf','03188888888','21321321','dsf@dd.hg','Pribadi','435345345 43543 534','2016-02-29 11:33:31',NULL,NULL,NULL,NULL,NULL),('aee50604c345b125fcfdf4b91586aa0e','2016-02-29','cxvxc dfgfgtre','fdgwer dfgfdgfd','3243556757','45645786876','dsf@dd.hg','Pribadi','435345345 43543 534','2016-02-29 11:31:11',NULL,NULL,NULL,NULL,NULL),('ecd968e2a3d5f48278b8526fb9ad8876','2016-02-29','dsfsdfdsfsdfdsfdsfwe3w','dsfsdfdsfdsf','324983209458302','21321321','abc@test.com','Pribadi','324324324','2016-02-29 11:30:52',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(100) NOT NULL,
  `slug` varchar(10) NOT NULL,
  `language_directory` varchar(100) NOT NULL,
  `language_code` varchar(20) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `languages` */

insert  into `languages`(`id`,`language_name`,`slug`,`language_directory`,`language_code`,`default`) values (8,'English','en','english','en_US',1),(9,'Indonesia','id','indonesian','id_ID',0);

/*Table structure for table `layanan` */

DROP TABLE IF EXISTS `layanan`;

CREATE TABLE `layanan` (
  `layanan_id` varchar(255) NOT NULL,
  `nama_layanan` text,
  `harga` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`layanan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `layanan` */

insert  into `layanan`(`layanan_id`,`nama_layanan`,`harga`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values ('382b4bb36c36052f0f7e6aefcd5a8272','Biasa',1400000,'2016-02-29 19:17:28','2016-02-29 19:21:57',NULL,NULL,NULL,NULL),('8dd5cf141ddaee9f8163a90175017bfb','Hemat',2000000,'2016-02-29 19:17:11',NULL,NULL,NULL,NULL,NULL),('b79f37a84988442647e5e8f878c2327f','Reguler',5000000,'2016-02-29 19:16:55',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `menu_item_translations` */

DROP TABLE IF EXISTS `menu_item_translations`;

CREATE TABLE `menu_item_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `language_slug` varchar(5) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `absolute_path` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `menu_item_translations` */

insert  into `menu_item_translations`(`id`,`item_id`,`language_slug`,`title`,`url`,`absolute_path`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values (15,8,'en','Our Product','#service',NULL,'2015-11-20 03:24:47',NULL,NULL,1,0,0),(14,7,'id','Tentang Kami','#about',NULL,'2015-11-20 03:22:53',NULL,NULL,1,0,0),(13,7,'en','About Us','#about',NULL,'2015-11-20 03:22:14',NULL,NULL,1,0,0),(12,6,'id','Beranda','#',NULL,'2015-11-20 03:20:56',NULL,NULL,1,0,0),(11,6,'en','Home','#',NULL,'2015-11-20 03:18:29',NULL,NULL,1,0,0),(16,8,'id','Produk','#service',NULL,'2015-11-20 03:25:34',NULL,NULL,1,0,0),(17,9,'en','Process','#team',NULL,'2015-11-20 03:26:52',NULL,NULL,1,0,0),(18,9,'id','Proses Produksi','#team',NULL,'2015-11-20 03:27:19',NULL,NULL,1,0,0),(19,10,'en','Blog','#blog',NULL,'2015-11-20 03:27:43',NULL,NULL,1,0,0),(20,10,'id','Blog','#blog',NULL,'2015-11-20 03:27:55',NULL,NULL,1,0,0),(21,11,'en','Contact Us','#contact',NULL,'2015-11-20 03:28:28',NULL,NULL,1,0,0),(22,11,'id','Kontak kami','#contact',NULL,'2015-11-20 03:28:56',NULL,NULL,1,0,0);

/*Table structure for table `menu_items` */

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned NOT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `order` int(4) unsigned NOT NULL,
  `styling` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `menu_items` */

insert  into `menu_items`(`id`,`menu_id`,`parent_id`,`order`,`styling`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values (7,2,0,1,'','2015-11-20 03:22:14','2015-11-20 03:22:53',NULL,1,1,0),(6,2,0,0,'','2015-11-20 03:18:29','2015-11-20 03:20:56',NULL,1,1,0),(8,2,0,2,'','2015-11-20 03:24:47','2015-11-20 03:25:34',NULL,1,1,0),(9,2,0,3,'','2015-11-20 03:26:52','2015-11-20 03:27:19',NULL,1,1,0),(10,2,0,4,'','2015-11-20 03:27:43','2015-11-20 03:27:55',NULL,1,1,0),(11,2,0,5,'','2015-11-20 03:28:28','2015-11-20 03:28:56',NULL,1,1,0);

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `menus` */

insert  into `menus`(`id`,`title`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values (2,'top-menu','2015-05-04 12:25:23',NULL,NULL,1,0,0);

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `paket_id` varchar(255) NOT NULL,
  `nama_paket` varchar(255) DEFAULT NULL,
  `nama_layanan` text,
  `harga` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`paket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paket` */

insert  into `paket`(`paket_id`,`nama_paket`,`nama_layanan`,`harga`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values ('231870064e7879f51770982aba46e002','PAKET-SATU','Hemat',2000000,'2016-02-29 21:03:26',NULL,NULL,NULL,NULL,NULL),('62e3a505a8cf1e1ed950e5c6d5b5159d','PAKET-DUA','Reguler',5000000,'2016-02-29 21:03:34',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `phrases` */

DROP TABLE IF EXISTS `phrases`;

CREATE TABLE `phrases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` varchar(255) NOT NULL,
  `language_slug` varchar(10) NOT NULL,
  `last_check` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `phrases` */

/*Table structure for table `slider_banner` */

DROP TABLE IF EXISTS `slider_banner`;

CREATE TABLE `slider_banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `caption` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `slider_banner` */

insert  into `slider_banner`(`id`,`file`,`caption`,`description`) values (10,'uploads/slider_1.jpg','Baju muslim sebagai simbol intelektual umat muslim.','Baju muslim sebagai simbol intelektual umat muslim.'),(12,'uploads/slider_2.jpg','BAMUS BHS yang paling banyak dipakai oleh semua kalangan.','BAMUS BHS yang paling banyak dipakai oleh semua kalangan.'),(13,'uploads/slider_3.jpg','Sarung BHS dikenal sebagai sarung terbaik sejak 1953.','Sarung BHS dikenal sebagai sarung terbaik sejak 1953.'),(14,'uploads/slider_4.JPG','Songkok BHS sebagai songkok mewah berkwalitas istimewa','Songkok BHS sebagai songkok mewah berkwalitas istimewa'),(15,'uploads/slider_5.jpg','BAMUS dan Sarung BHS nyaman dipakai kapanpun.','BAMUS dan Sarung BHS nyaman dipakai kapanpun.'),(16,'uploads/slider_7.jpg','Atlas diciptakan untuk Anda yang berselera tinggi, dibuat dengan benang kualitas terbaik, lembut dipakai, nyaman ketika dikenakan, dan yang pasti menambah gaya Anda.','Atlas diciptakan untuk Anda yang berselera tinggi, dibuat dengan benang kualitas terbaik, lembut dipakai, nyaman ketika dikenakan, dan yang pasti menambah gaya Anda.'),(17,'uploads/slider_8.jpg','Sarung dan Bamus BHS terfavorit dikalangan para Remaja.','Sarung dan Bamus BHS terfavorit dikalangan para Remaja.'),(18,'uploads/slider_9.jpg','Sarung dan Bamus BHS bisa dipakai santai ataupun acara resmi.','Sarung dan Bamus BHS bisa dipakai santai ataupun acara resmi.'),(19,'uploads/slider_10.jpg','Resmi Bisa Santai Bisa....','Resmi Bisa Santai Bisa....'),(20,'uploads/slider_111.jpg','Produk-produk BHS....','Produk-produk BHS....'),(21,'uploads/slider_12.jpg','Produk-produk BHS....','Produk-produk BHS....');

/*Table structure for table `slugs` */

DROP TABLE IF EXISTS `slugs`;

CREATE TABLE `slugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type` varchar(150) NOT NULL,
  `content_id` int(11) NOT NULL,
  `translation_id` int(11) NOT NULL,
  `language_slug` varchar(5) NOT NULL,
  `url` varchar(255) NOT NULL,
  `redirect` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

/*Data for the table `slugs` */

insert  into `slugs`(`id`,`content_type`,`content_id`,`translation_id`,`language_slug`,`url`,`redirect`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values (61,'category',25,38,'id','blog',0,'2015-12-02 04:37:58',NULL,NULL,1,0,0),(38,'page',21,16,'ro','sindicat-ratb-calatorii-vor-fi-informati-luni-ca-este-posibila-suspendarea-transportului-in-comun',0,'2015-05-22 16:38:23',NULL,NULL,1,0,0),(43,'category',25,21,'ro','blog',0,'2015-05-26 13:42:56',NULL,NULL,1,0,0),(50,'category',31,27,'en','en',0,'2015-11-23 03:08:58',NULL,NULL,1,0,0),(51,'category',31,28,'id','id',0,'2015-11-23 03:12:27',NULL,NULL,1,0,0),(52,'post',32,29,'en','silaturrahim-icmi-orwil-jawa-timur-ke-pt-behaestex',0,'2015-11-23 03:29:46',NULL,NULL,1,0,0),(53,'post',33,30,'en','stand-atlas-di-acara-nu-expo',0,'2015-11-23 04:52:27',NULL,NULL,1,0,0),(54,'post',34,31,'en','kunjungan-siswa-sekolah-alam-insan-mulia',0,'2015-11-23 08:16:30',NULL,NULL,1,0,0),(55,'post',35,32,'en','kunjungan-ikatan-alumni-wira-usaha-muda-mandiri',0,'2015-11-23 08:18:37',NULL,NULL,1,0,0),(56,'post',36,33,'en','en-1',0,'2015-11-23 08:20:31',NULL,NULL,1,0,0),(57,'post',37,34,'en','atlas-ketika-mensponsori-jalan-semangat-hari-pahlawan-bersama-esq-165',0,'2015-11-23 08:22:42',NULL,NULL,1,0,0),(58,'category',38,35,'en','product',0,'2015-12-02 02:57:54',NULL,NULL,1,0,0),(59,'category',38,36,'id','produk',0,'2015-12-02 02:58:27',NULL,NULL,1,0,0),(60,'post',39,37,'en','atlas-jaquard',0,'2015-12-02 03:05:31',NULL,NULL,1,0,0);

/*Table structure for table `tags_produk` */

DROP TABLE IF EXISTS `tags_produk`;

CREATE TABLE `tags_produk` (
  `id_tags` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_galeri` int(11) unsigned NOT NULL,
  `nama_tags` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tags`),
  KEY `tags_produk_ibfk_1` (`id_galeri`),
  CONSTRAINT `tags_produk_ibfk_1` FOREIGN KEY (`id_galeri`) REFERENCES `galeri_produk` (`id_galeri`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `tags_produk` */

insert  into `tags_produk`(`id_tags`,`id_galeri`,`nama_tags`) values (1,1,'Sarung'),(2,1,'Jaquard'),(3,1,'Atlas'),(4,2,'Sarung'),(5,2,'Atlas'),(6,2,'Super'),(7,3,'Sarung'),(8,3,'Atlas'),(9,3,'Super'),(10,4,'Sarung'),(11,4,'Atlas'),(12,4,'Super'),(13,5,'Sarung'),(14,5,'Atlas'),(15,5,'Super'),(16,6,'Sarung'),(17,6,'Atlas'),(18,6,'Premium'),(19,7,'Sarung'),(20,7,'Atlas'),(21,7,'Premium'),(22,8,'Sarung'),(23,8,'Atlas'),(24,8,'Premium'),(25,9,'Sarung'),(26,9,'Atlas'),(27,9,'Premium'),(28,10,'Sarung'),(29,10,'Atlas'),(30,10,'Premium'),(31,11,'Sarung'),(32,11,'Atlas'),(33,11,'Premium'),(34,12,'Sarung'),(35,12,'Atlas'),(36,13,'Sarung'),(37,13,'Atlas'),(38,14,'Sarung'),(39,14,'Atlas'),(40,15,'Sarung'),(41,15,'Atlas'),(42,15,'Junior'),(43,16,'Sarung'),(44,16,'Atlas'),(45,16,'Junior');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values (1,'127.0.0.1','administrator','$2y$08$G0h47xFzvBDD3DjwWD13XeCfwGuZgqtSodh5ARhDJLLWPRv0jSgfG','','info@behaestex.co.id','',NULL,NULL,NULL,1268889823,1452646591,1,'Admin','istrator','ADMIN','0'),(2,'::1','btx','$2y$08$YagivZvJ/rC/3iq5.B6Y1O1QyB7tw2TMxKvSAhUnTWY0xM9CS5xrK',NULL,'btx@behaestex.co.id',NULL,NULL,NULL,NULL,1448265757,1456748012,1,'BTX','','','');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values (3,1,1),(7,2,1),(8,2,2);

/*Table structure for table `website` */

DROP TABLE IF EXISTS `website`;

CREATE TABLE `website` (
  `title` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `admin_email` varchar(200) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `modified_by` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `website` */

insert  into `website`(`title`,`page_title`,`status`,`admin_email`,`contact_email`,`modified_by`) values ('PT. Coba coba','coba coba',1,'info@xxx.com','info@xxx.com','1'),('PT. Coba coba','coba coba',1,'info@xxx.com','info@xxx.com','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
