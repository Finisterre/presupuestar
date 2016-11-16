<?php

class Pro_zones extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_zones() {



        $query = $this->db->get('zones');

        return $query->result();

    }
}



?>