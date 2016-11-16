<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class SlideUpload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));

    }

    public function index()
    {

        //getData

        $error = $this->input->get('error');

        if($error != ''){
            $data['error'] = json_decode($this->input->get('error'));
        }else{
            $data['error'] = ' ' ;
        }


        //log in function
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('SlideUpload', $data);
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
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('SlideUpload', $data);
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

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        $config['upload_path'] = './assets/images_gal/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000';
     /*   $config['max_width']  = '950';
        $config['max_height']  = '360';
        $config['max_width']  = '950';
        $config['max_height']  = '360';*/

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = json_encode($this->upload->display_errors());

            $errorPost = $error;
            redirect('SlideUpload/?error='.$errorPost, 'refresh');
        }
        else
        {
            $titulo = $this->input->post('titulo');
            $link = $this->input->post('link');
            $img = $this->upload->data('file_name');

            $QueryData = array(
                'titulo' => $titulo,
                'link' => $link,
                'img' => $img
            );
            $this->db->insert('slider', $QueryData);

            redirect('admin', 'refresh');
        }
    }
}
