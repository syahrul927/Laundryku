<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "ParentControllerAdmin.php";
class Dashboard extends ParentControllerAdmin {

	 function __construct() {
		parent:: __construct();
		$this->load->model("CustomerModel");
		$this->load->model("TransactionModel");
	}
	public function index(){
        $this->load->view('_part/header');
        $this->load->view('dashboard');
        $this->load->view('_part/footer');
		
        
    }
	public function info(){
        $this->output
            ->set_content_type('application/json');
		$listRegis = $this->CustomerModel->getLastRegister();
		$countRecent = $this->CustomerModel->countTotalUser();
		$countTransPackage = $this->TransactionModel->countTransactionByPackage();
		$countTransMonth = $this->TransactionModel->countTransactionByMonth();
		$res = array (
			"totalCustomer"=>$countRecent,
			"recentCustomer" => $listRegis,
			"transactionMonth"=> $countTransMonth,
			"transactionPackage"=>$countTransPackage
		);   
		$this->output
		->set_status_header(200)
		->set_output(json_encode($res));
	}
}
?>