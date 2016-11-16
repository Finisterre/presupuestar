<?php

class Rubros_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_rubros() {



        $query = $this->db->get_where('rubros', array('state' => 1));

        return $query->result();

    }
}



?>