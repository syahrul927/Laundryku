<?php

require_once "ParentControllerAdmin.php";
    class Customer extends ParentControllerAdmin
    {
        function __construct()
    {
        parent::__construct();
        $this->load->model("CustomerModel");
    }

    function index()
    {
        $this->load->view('_part/header');
        $this->load->view('customer/customerView');
        $this->load->view('customer/customerForm');
        $this->load->view('_part/footer');
    }
    function show($detail = null, $id = null)
    {
        $this->output
            ->set_content_type('application/json');

        $responseDto = new ResponseController();
        if (isset($detail)) {
            if (empty($id)) {
                $responseDto->setStatus(400);
                $responseDto->setSuccess(false);
                $this->responseBuilder($responseDto);
            }
            $responseDto->setContent($this->CustomerModel->getDetailCustomerById($id));
            $responseDto->setSuccess(true);
            $this->responseBuilder($responseDto);
        } else {
            $responseDto->setSuccess(true);
            $responseDto->setContent($this->CustomerModel->getListCustomer());
            $this->responseBuilder($responseDto);
        }
    }
    function save()
    {
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['telp'])) {
            $param = $this->postToDto();
            $res = $this->CustomerModel->saveCustomer($param);
            if ($res == null) {
                $responseDto->setSuccess(false);
                $responseDto->setStatus(500);
            } else {
                $responseDto->setSuccess(true);
                $responseDto->setStatus(200);
                $responseDto->setContent($res);
            }
        $this->responseBuilder($responseDto);
        }
    }

    function update()
    {
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if(empty($_POST['customerId'])){
            $responseDto->setStatus(400);
            $this->responseBuilder($responseDto);
        }
        $dto =  $this->postToDto(); 
        $res = $this->CustomerModel->updateCustomer($dto);
        if ($res == null) {
            $responseDto->setSuccess(false);
            $responseDto->setStatus(500);
        } else {
            $responseDto->setSuccess(true);
            $responseDto->setStatus(200);
            $responseDto->setContent($res);
        }
    $this->responseBuilder($responseDto);
    }
    function delete()
    {
        $this->output
            ->set_content_type('application/json');

        $responseDto = new ResponseController();
        if (isset($_POST['customerId'])) {
            $responseDto->setSuccess($this->CustomerModel->deleteCustomerById($_POST['customerId']));
        } else {
            $responseDto->setSuccess(false);
            $responseDto->setStatus(400);
        }
        $this->responseBuilder($responseDto);
    }
    function logout()
    {
        session_destroy();
    }

    private function responseBuilder($responseDto)
    {
        $status = $responseDto->getStatus() == null ? 200 : $responseDto->getStatus();
        $responseDto->setStatus($status);
        $this->output
            ->set_status_header($status)
            ->set_output(json_encode($responseDto));
    }

    function postToDto()
    {
        $param = new $this->CustomerModel();
        if (isset($_POST['customerId'])) {
            $param->setCustomerId($_POST['customerId']);
        }
        $param->setName($_POST['name']);
        $param->setAddress($_POST['address']);
        $param->setTelp($_POST['telp']);
        return $param;
    }
    }
    
?>