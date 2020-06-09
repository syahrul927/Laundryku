<?php

    class Menuutama extends CI_Controller 
    {
        function __construct()
        {
            parent::__construct();
            if(empty($_SESSION['username'])){
                redirect(base_url('login')); 
            }
            $this->load->model('Global_m');
        }
        public function index(){
            $this->load->view('_part/header');
            $this->load->view('menuutama_v');
            $this->load->view('_part/footer');
        }
        
    }
    
?>