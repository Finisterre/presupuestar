<?php

class Pro_rubros extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_rubros() {



        $query = $this->db->get('rubros');

        return $query->result();

    }
}
?>