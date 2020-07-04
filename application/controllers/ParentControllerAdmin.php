<?php
include('ResponseController.php');
    class ParentControllerAdmin extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            
            // if(empty($_SESSION['username'])){
            //    redirect(base_url()."Login");
            // }
        }
        

    }
    
?>