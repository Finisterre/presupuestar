<?php

class Upload extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
    }

    function index()
    {


    }

    function do_upload()

    {


//UPLOAD FILE
        $config['upload_path'] = './assets/images_gal/';
        $config['allowed_types'] = 'gif|jpg|png';
    /*    $config['max_size']	= '900';
        $config['max_width']  = '949';
        $config['max_height']  = '359';
        $config['min_width']  = '951';
        $config['min_height']  = '361';*/

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $data = array('upload_data' => $this->upload->data());
            $id = $this->input->post('id');
            $errorPost = json_encode($this->upload->display_errors());



            redirect('SlideEdit/?id='.$id.'&error='.$errorPost, 'refresh');


        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $error = ' ';

            //UPDATE RECORD

            $titulo = $this->input->post('titulo');
            $link = $this->input->post('link');
            $img = $this->upload->data('file_name');

            $QueryData = array(
                'titulo' => $titulo,
                'link' => $link,
                'img' => $img
            );

            $new = 0;

            $new = $this->input->post('new');

            if($new == 0){
                $id = $this->input->post('id');
                $this->db->where('id', $id);
                $this->db->update('slider', $QueryData);
            }else{
                $this->db->insert('slider', $QueryData);
            }


        }




//login

        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];


            $errorPost = json_encode($error);

            if($error != ' '){
              //  $this->load->view('SlideEdit');

      if($new == 0){
               redirect('SlideEdit/?id='.$id.'&error='.$errorPost, 'refresh');
           }else{
               redirect('SlideUpload/?error='.$errorPost, 'refresh');
           }


            }else{
                redirect('admin', 'refresh');
                //$this->load->view('upload_success', $data);
            }

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
}
?>