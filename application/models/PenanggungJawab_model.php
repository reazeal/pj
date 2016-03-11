<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PenanggungJawab_model extends MY_Model
{
    public $table = 'detail_penanggung_jawab';
    public $primary_key = 'penanggung_jawab_id';    
    public function __construct()
    {
        parent::__construct();
        
    }
}