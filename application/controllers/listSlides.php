<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ListSlides extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library('breadcrumbs');

    }

    public function index()
    {

        //getData

        $this->breadcrumbs->push('Admin', '/Admin');
        $this->breadcrumbs->push('Slides Inicio', '/listSlides');


// unshift crumb


// output

        $breadcrumbs = $this->breadcrumbs->show();
        $data['breadcrumbs'] =$breadcrumbs;

        $querySlides = $this->db->order_by("orden", "asc");
        $querySlides = $this->db->get('slider');
        $slides =  $querySlides->result();

        $data['slides'] = $slides;
        $data['home'] = 0;


        //log in function
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('listSlides', $data);
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
        redirect('login', 'refresh');
    }


}