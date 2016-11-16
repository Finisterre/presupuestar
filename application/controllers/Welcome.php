<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function index(){
        $this->load->helper('url');
        $this->load->model('rubros_model');
        $data['rubros'] = $this->rubros_model->get_rubros();

        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['user_type'] = $session_data['user_type'];
            $data['user_names'] = $session_data['name'].', '.$session_data['last_name'];

        }
        $this->load->view('home', $data);

    }
}
