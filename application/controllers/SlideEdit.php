<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class SlideEdit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library('breadcrumbs');

    }

    public function index()
    {

        // load Breadcrumbs


// add breadcrumbs
        $this->breadcrumbs->push('Admin', '/Admin');
        $this->breadcrumbs->push('Slides Inicio', '/listSlides');
        $this->breadcrumbs->push('Editar', '/SlideEdit');

// unshift crumb


// output

        $breadcrumbs = $this->breadcrumbs->show();
      $data['breadcrumbs'] =$breadcrumbs;

        //getData

        if(empty($this->input->post)){

            $id = $this->input->get('id');

            $this -> db -> select();
            $this -> db -> from('slider');
            $this -> db -> where('id = ' . "'" . $id . "'");
            $this -> db -> limit(1);

            $query = $this -> db -> get();

            if($query -> num_rows() == 1)
            {
                $dataSlide = $query->result();
            }
            else
            {
                $dataSlide = false;
            }



        }

        $data['slide'] =  $dataSlide;
        $error = $this->input->get('error');
        if(!empty($error)){
            $data['error'] = json_decode($this->input->get('error'));
        }else{
            $data['error'] = ' ' ;
        }



        //log in function
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('SlideEdit', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

        function logout()
        {
            $this->session->unset_userdata('logged_in');
            session_destroy();
            redirect('login', 'refresh');
        }


    }

    function do_upload()
    {


        $config['upload_path'] = './assets/images_gal/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
    }
}
