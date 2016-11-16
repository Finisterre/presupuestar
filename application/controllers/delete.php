<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class delete extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function index()
    {



        $table = $this->input->post('table');
        $where= json_decode($this->input->post('where'),true);



        $this->db->delete($table, $where);




        echo 'Success';

    }




}

