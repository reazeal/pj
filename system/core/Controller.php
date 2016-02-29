<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	 //Mengubah format tanggal dari database ke format tgl-bln-thn
	function tanggal($tgl){
    	   if(!empty($tgl)){
    	    $tgl=explode(" ",$tgl);
    		$tgl=explode("-",$tgl[0]);
            
    		return $tgl[2]."-".$tgl[1]."-".$tgl[0];
    	   }else {
    	    return "-";   
    	   }
	}

	//Mengubah format tanggal dari format tgl-bln-thn ke database
	function tanggaldb($tgl){
	   if(!empty($tgl)){
	    
            $tgl=explode("-",$tgl);
    		return $tgl[2]."-".$tgl[1]."-".$tgl[0];
           
	   }else{
	       return "0000-00-00";   
	   }
		
	}
    
    function get_nm_hr($a) {
		if ($a == 'Wed')
			$b = 'RB';
		elseif ($a == 'Thu')
			$b = 'KM';
		elseif ($a == 'Fri')
			$b = 'JM';
		elseif ($a == 'Sat')
			$b = 'SB';
		elseif ($a == 'Sun')
			$b = 'MG';
		elseif ($a == 'Mon')
			$b = 'SN';
		elseif ($a == 'Tue')
			$b = 'SL';
		return $b;
	}

	function get_nama_bulan_id($a) {
		if ($a == 1)
			$b = 'Januari';
		elseif ($a == 2)
			$b = 'Pebruari';
		elseif ($a == 3)
			$b = 'Maret';
		elseif ($a == 4)
			$b = 'April';
		elseif ($a == 5)
			$b = 'Mei';
		elseif ($a == 6)
			$b = 'Juni';
		elseif ($a == 7)
			$b = 'Juli';
		elseif ($a == 8)
			$b = 'Agustus';
		elseif ($a == 9)
			$b = 'September';
		elseif ($a == 10)
			$b = 'Oktober';
		elseif ($a == 11)
			$b = 'Nopember';
		else
			$b = 'Desember';
		return $b;
	}
    
    function terbilang($x)
    {
    	$bil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    	if ($x < 12)
    		return " " . $bil[$x];
    	elseif ($x < 20)
    		return $this->terbilang($x - 10) . " belas";
    	elseif ($x < 100)
    		return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
    	elseif ($x < 200)
    		return " seratus" . $this->terbilang($x - 100);
    	elseif ($x < 1000)
    		return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
    	elseif ($x < 2000)
    		return " seribu" . $this->terbilang($x - 1000);
    	elseif ($x < 1000000)
    		return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
    	elseif ($x < 1000000000)
    		return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
    }
    
    
    function nama_hari($tgl,$sep){
    	// format tanggal adalah YYYY-mm-dd
        $sepparator = $sep; //separator. contoh: '-', '/'
        $parts = explode($sepparator, $tgl);
        $d = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
 
        if ($d=='Monday'){
            return 'Senin';
        }elseif($d=='Tuesday'){
            return 'Selasa';
        }elseif($d=='Wednesday'){
            return 'Rabu';
        }elseif($d=='Thursday'){
            return 'Kamis';
        }elseif($d=='Friday'){
            return 'Jumat';
        }elseif($d=='Saturday'){
            return 'Sabtu';
        }elseif($d=='Sunday'){
            return 'Minggu';
        }else{
            return 'ERROR!';
        }
    }

}
