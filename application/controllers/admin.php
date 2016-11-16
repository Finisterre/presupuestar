<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function index()
    {




//log in function
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['user_type'] = $session_data['user_type'];

            switch ($data['user_type']) {
                case 1:
                    redirect('/', 'refresh');
                break;
                 case 2:
                     $this->load->view('admin_home', $data);
                break;
                  case 3:
                      $this->load->view('admin_home', $data);

                break;
                    }



        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('/', 'refresh');
    }


}
