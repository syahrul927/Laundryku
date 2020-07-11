<?php
include('ResponseController.php');
    class ParentControllerAdmin extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            
            // if(empty($_SESSION['username'])){
            //    redirect(base_url("account/login"));
            // }
        }
        
    public function requestBuilder(){
        return (array)json_decode(file_get_contents('php://input'));
     }

    }
    
?>